<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    echo 'asdsadasdsa';
});

Route::any('/location/{longhitude}/{latitude}', 'MainController@location_data');
Route::any('/location', 'MainController@location');

Route::any('/sample_volley_request', 'MainController@sample_volley_request');