<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Model\Tbl_User;
use GoogleMaps;
use GoogleGeocoder;
use Mapper;
use Request;
use Carbon\Carbon;
use Hash;

class MainController extends Controller
{
    function location()
    {
        Mapper::map(14.8621226, 120.9515384, ['zoom' => 15, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]] );
    	return view('google_map');
    }

    function location_data($longhitude, $latitude)
    {
    	Mapper::map($latitude, $longhitude, ['zoom' => 15, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]] );
    	return view('google_map');
    }

    function insert_request()
    {

    }

    function sample_volley_request()
    {
    	$data['input_one'] = Request::Input('input_one');
    	$data['input_two'] = Request::Input('input_two');

    	return json_encode($data);
    }

    function register_user()
    {

    	$data['first_name']		=	Request::input('first_name');
		$data['last_name']		=	Request::input('last_name');
        $data['name']           =   $data['first_name'] + $data['last_name'];
		$data['contact_number']	=	Request::input('contact_number');
		$data['address']		=	Request::input('address');
		$data['email']			=	Request::input('email');
        $data["password"]       =   Hash::make($data['contact_number']);
        $data['created_at']     =   Carbon::now();


        $user_exist = Tbl_User::where('first_name',$data['first_name'])->where('last_name',$data['last_name'])->where('contact_number',$data['contact_number'])->first();
		$number = Tbl_User::where('contact_number',$data['contact_number'])->first();
        $email = Tbl_User::where('email',$data['email'])->first();
        
        if ($email) 
        {
            return 'Email Already Exist';
        }

        else if ((!$user_exist) && (!$number)) 
        {
            $user_online_id = Tbl_User::insertGetId($data);
            return $user_online_id+"";
        }
        else
        {
            return 'User Already Exist';
        }
    }
}