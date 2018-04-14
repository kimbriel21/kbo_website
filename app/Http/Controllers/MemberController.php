<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Globals\Authenticator;
use AppModel\Tbl_user;
use App\Model\Tbl_login;
use Session;
use View;
use Crypt;

class MemberController extends Controller
{
	public $user_info;
	function __construct()
	{
		$this->middleware(function ($request, $next)
		{
			$member = Authenticator::checkLogin();
			
			if(!$member)
			{
				return redirect("/login");
			}
			else
			{
				$login_session 	= explode("-", unserialize(Crypt::decryptString(Session::get('login'))));
				$login_key 		= $login_session[0];
				$hashed_pw 		= $login_session[1];
				$login 			= Tbl_login::where("login_key", $login_key)->joinMember()->first();
				$this->user_info = $login;
				
				// $user_info   = Tbl_User::where("email", Session::get('email'))->first();
				$this->member = $member;
				View::share("session_member", $member);
			}

			return $next($request);
		});
	}
}