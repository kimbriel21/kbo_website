<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Model\Tbl_User;
use App\Model\Tbl_Request;
use GoogleMaps;
use GoogleGeocoder;
use Mapper;
use Request;
use Carbon\Carbon;
use Hash;
use Image;
use Crypt;
use Nexmo;

class MainController extends Controller
{
    function location()
    {
        Mapper::map(14.8621226, 120.9515384, ['zoom' => 15, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]] );
        $param = array("latlng"=>"14.8621226, 120.9515384");
        $response = \Geocoder::geocode('json', $param); //for exact name of location
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
        $data['name']           =   Request::input('first_name') + Request::input('last_name');
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

    function user_request()
    {
        $data['id']                     = Request::input('id');
        $data['emergency_type']         = Request::input('emergency_type');
        $data['emergency_category']     = Request::input('emergency_category');
        $data['location_longhitude']    = Request::input('location_longhitude');
        $data['location_latitude']      = Request::input('location_latitude');
        $data['office_branch']          = Request::input('office_branch');
        $data['date_requested']         = Carbon::now();
        $data['status']                 = 'Pending';

        if(Request::has('image')) 
        {
            $image = Request::input('image');
            $image = trim(preg_replace('~[\r\n]+~', '', $image));
            $file = base64_decode($image);
            $path = public_path().'/assets/images/'.Request::input('image_name').'a.jpg';
            $data['img_url']   = $path;
            Image::make($file)->save($path);
        }

        Tbl_Request::insert($data);

        return 'success';
    }

    function view_image()
    {
        $request_id      = Request::input('request_id');
        $request         = Tbl_Request::where('request_id',$request_id)->first();

        if ($request['img_url'] != "" || $request['img_url'] != null) 
        {
            $img_url         = $request['img_url'];
            $data['img_url'] = str_replace('/var/www/html/kbo_website/public', '', $img_url);
        }
        else
        {
            $data['img_url'] = "/assets/images/no_image.jpg";
        }

        return view('view_image',$data);
    }

    function select_data_request()
    {
        $params['request_id']           =    Request::input('request_id');
        $params['office_branch']        =    Request::input('office_branch');
        $params['emergency_type']       =    Request::input("emergency_type");
        $params['request_date_from']    =    Request::input("request_date");

        $params['status']               =    Request::input("status");
        $data["_request"]               =    Tbl_Request::joinUsers($params)->get();
        
        return json_encode($data["_request"]);
    }

    function action_request()
    {
        $request_id                 =    Request::input('request_id');
        $update['status']           =    Request::input('action_request');
        Tbl_Request::where('request_id', $request_id)->update($update);
        
        return 'success';
    }

    function send_message()
    {
        $number_to      = Request::input('number_to');
        $number_from    = Request::input('number_from');
        $text           = Request::input('text');


        if (substr($number_to, 0,2) == "09") 
        {
            $number_to = "63".substr($number_to, 1,strlen($number_to));
        }

        if (substr($number_from, 0,2) == "09") 
        {
            $number_from = "63".substr($number_from, 1,strlen($number_from));
        }
        // Nexmo::message()->send([
        //     'to'   => $number_to,
        //     'from' => $number_from,
        //     'text' => $text
        // ]);
    }
}