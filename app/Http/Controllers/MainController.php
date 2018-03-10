<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use GoogleMaps;
use GoogleGeocoder;
use Mapper;
use Request;

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
}