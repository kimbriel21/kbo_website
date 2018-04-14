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

class AuthenticationController extends Controller
{

	__construct()
	{
		
	}
	
	public function index()
	{
		
	}
}