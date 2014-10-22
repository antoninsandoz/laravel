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

//HOME page
Route::get('/', 'HomeController@show');
//Route::get('/', array('as' => 'home', 'uses' => 'HomeController@show'));

//USER
Route::get('user', 'UserController@show');
Route::post('user', 'UserController@update');
Route::post('user/new', 'UserController@store');
//password
Route::get('user/password', 'UserController@password');
Route::post('user/password', 'UserController@update');
//userImage
Route::get('user/image', 'UserimageController@getForm');
Route::post('user/image', 'UserimageController@postForm');

//LOGIN
Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@getLogout');

//WALL
//Route::resource('wall', 'WallController');
Route::get('/wall/{id}', 'WallController@show');
Route::get('/wall', 'WallController@showlogged'); //if no id check if logged
Route::get('/adminwall', 'WallController@adminshow');

// the url adress don't exist
App::missing(function()
{
	return View::make('page_not_found');
  //return 'page_not_found';
});