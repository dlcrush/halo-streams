<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StreamController@featured');
Route::get('streams/random', 'StreamController@random');
Route::get('streams/{id}', 'StreamController@show');
Route::get('streams', 'StreamController@index');

Route::get('contactus', 'ContactController@showForm');
Route::post('contactus', 'ContactController@send');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
