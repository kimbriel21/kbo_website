<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\MemberController;

use App\Model\Tbl_User;
use App\Model\Tbl_Request;
use App\Model\Tbl_server_user;
use App\Model\Tbl_software_user;
use App\Model\Tbl_register_verification;

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

class ServerController extends MemberController
{
	public function index()
	{
		return view('dashboard');
	}




	public function verification()
	{
		$data['verification_code'] = rand(100000,999999);
		$data['_verification_data'] = Tbl_register_verification::get();
		
		return view('verification',$data);
	}

	public function create_new_verification()
	{
		
		$insert['station_type'] 		= Request::input('station');
		$insert['station_branch'] 		= Request::input('station_branch');
		$insert['verification_code'] 	= Request::input('verification_code');
		Tbl_register_verification::insert($insert);
		
		return redirect('/verification');
	}


	public function reports()
	{
		$params['request_id']           =    Request::input('request_id');
		$params['office_branch']        =    Request::input('office_branch');
		$params['emergency_type']       =    Request::input("emergency_type");
		$params['request_date']         =    Request::input("request_date");
		$params['status']               =    Request::input("status");
		$data["_request"]               =    Tbl_Request::joinUsers($params)->get();
		
		return view('reports',$data);
	}

	function logout()
	{
		Session::forget('login');
		return redirect('/login');
	}
}
