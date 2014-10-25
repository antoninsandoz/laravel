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
Route::get('/wall/{id}/{pagination}', 'WallController@index');
Route::get('/bird/{id_p}', 'WallController@show');
//admin
Route::get('/adminwall/{id_b}', 'AdminWallController@adminindex');

//like (Ajax)
Route::get('like/{id_p}', 'LikeController@add'); 
Route::get('dontlike/{id_p}', 'LikeController@remove');

//comment (Ajax)
Route::post('comment/new/{id_p}', 'CommentController@add');
Route::post('comment/{id_p}', 'CommentController@update');
Route::get('comment/delete/{id_p}', 'CommentController@remove');

// the url adress don't exist
App::missing(function()
{
	return View::make('pagenotfound');
  //return 'page_not_found';
});