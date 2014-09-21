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

//base page
Route::get('/', 'HomeController@show');

//user controller
Route::resource('user', 'UserController');

// the url adress don't exist
App::missing(function()
{
	return View::make('page_not_found');
  //return 'page_not_found';
});