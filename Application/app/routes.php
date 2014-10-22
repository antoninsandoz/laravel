<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//home page
Route::get('/', 'HomeController@show');

//user controller
//Route::resource('user', 'UserController');
Route::get('user', 'UserController@show');
Route::post('user', 'UserController@update');
Route::post('user/new', 'UserController@store');

//password
Route::get('password', 'UserController@password');
Route::post('password', 'UserController@update');
//userImage
//Route::controller('Userimage', 'UserimageController');
Route::get('userimage', 'UserimageController@getForm');
Route::post('userimage', 'UserimageController@postForm');

//login
Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@getLogout');

/*********WALL*********/
//Route::resource('wall', 'WallController');
Route::get('/wall/{id}', 'WallController@show');
Route::get('/adminwall/{id_b}', 'WallController@adminshow');

// the url adress don't exist
App::missing(function()
{
	return View::make('page_not_found');
  //return 'page_not_found';
});