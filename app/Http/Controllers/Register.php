<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Model\Tbl_User;
use App\Model\Tbl_Request;
use App\Model\Tbl_server_user;
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
use Redirect;
use View;
use Input;
use File;    
use Validator;

class Register extends Controller
{
	public function index()
	{
		return view('register');
	}

	public function register()
	{
		if (Request::method() == "GET") 
    	{
    		return view('register');
    	}
    	else
    	{
	    	/* INITIALIZE RULES */
			$rules["full_name"]           = array("required", "string");
			// $rules["email"]               = array("required", "email", "unique:users,email");
			// $rules["contact_number"]      = array("required", "string", "min:11");
			$rules["password"]            = array("required", "string", "min:6");
			$rules["confirm_password"]    = array("required", "string", "min:6");
	        
	        $validator = Validator::make(Request::all(), $rules);

	        /* VALIDATE REGISTRATION */
	        if($validator->fails())
	        {
	        	$errors = $validator->errors()->all();
	            return redirect::back()->with("errors", $errors)->withInput();
	        }
	        else
	        {
        		$count_errors = 0;
        		$user = Tbl_server_user::where('email',Request::Input('email'))->first();
        		if (Request::Input('password') != Request::Input('confirm_password'))
        		{
        			$errors[$count_errors] = "Password and confirm password did not match.";
        			$count_errors++;
        		}

        		if ($user) 
        		{
        			$errors[$count_errors] = "E-mail already exist.";
        			$count_errors++;
        		}

        		if ($count_errors > 0) 
        		{
        			return redirect::back()->with("errors", $errors)->withInput();
        		}
        		else
        		{
        			$data = null;
        			$data['name']				= Request::Input('full_name');
        			$data['email']				= Request::Input('email');
        			$data['password']			= Hash::make(Request::Input('password'));
        			// $data['user_key']			= Hash::make(Request::Input('password').''.Request::Input('email'));
        			// $data['contact_number']		= Request::Input('contact_number');
        			// $data['is_admin']			= 0;
        			// $data['create_ip_address']	= $_SERVER['REMOTE_ADDR'];
        			$data['created_at']			= Carbon::now();
        			$data['updated_at']			= Carbon::now();
        			Tbl_server_user::insert($data);

        			return redirect("/login")->with("success", "Account Created Successfully");
        		}
	        }
    	}
	}
}