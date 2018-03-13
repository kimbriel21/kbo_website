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
Route::any('/register_user', 'MainController@register_user');
Route::any('/user_request', 'MainController@user_request');
Route::any('/view_image', 'MainController@view_image');
Route::any('/select_data_request', 'MainController@select_data_request');