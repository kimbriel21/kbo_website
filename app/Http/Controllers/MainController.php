<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use GoogleMaps;
use GoogleGeocoder;
use Mapper;

class MainController extends Controller
{
    function location()
    {
        Mapper::map(14.8621226, 120.9515384, ['zoom' => 15, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]] );
    	return view('google_map');
    }
}