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




Route::any('/login','Login@login');
Route::any('/register','Register@register');
Route::any('/logout', 'ServerController@logout');


Route::any('/dashboard', 'ServerController@index');


Route::any('/verification', 'ServerController@verification');
Route::any('/create_new_verification', 'ServerController@create_new_verification');




Route::any('/reports', 'ServerController@reports');




Route::any('/location/{longhitude}/{latitude}', 'MainController@location_data');
Route::any('/location', 'MainController@location');

Route::any('/sample_volley_request', 'MainController@sample_volley_request');
Route::any('/register_user', 'MainController@register_user');
Route::any('/user_request', 'MainController@user_request');
Route::any('/view_image', 'MainController@view_image');
Route::any('/select_data_request', 'MainController@select_data_request');
Route::any('/action_request', 'MainController@action_request');

Route::any('/register_request', 'MainController@register_request');
Route::any('/login_request', 'MainController@login_request');
Route::any('/login_data_request', 'MainController@login_data_request');



Route::any('/send_message', 'MainController@send_message');



