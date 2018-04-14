<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Model\Tbl_User;
use App\Model\Tbl_software_user;
use App\Model\Tbl_server_user;
use App\Model\Tbl_Request;
use App\Globals\Authenticator;
use GoogleMaps;
use GoogleGeocoder;
use Mapper;
use Request;
use Carbon\Carbon;
use Hash;
use Image;
use Crypt;
use Nexmo;
use Session;

class login extends Controller
{
	function login()
    {
    	if (Request::method() == 'GET') 
        {
    		return view('login');
    	}
    	else
    	{
    		/* AUTHENTICATE LOGIN */
    		$username_email  = Request::Input('email');
    		$check_member    = Tbl_server_user::where("email", $username_email)->first();
            
    		if($check_member)
    		{
    		    if (Hash::check(Request::Input('password'), $check_member->password))
    		    {
    		    	Session::flash('email',$username_email);
    		    	Authenticator::login($check_member->id, $check_member->password);
    		       	return redirect('/dashboard');
    		    }
    		    else
    		    {

    		        $errors = "You've entered an invalid account.";
    		        return redirect('/login')->with("error", $errors)->withInput();
    		    }
    		}
    		else
    		{
    		    $errors = "You've entered an invalid account.";
    		    return redirect('/login')->with("error", $errors)->withInput();
    		}
    	}
    }
}