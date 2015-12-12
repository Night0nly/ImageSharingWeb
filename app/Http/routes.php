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


//This is for the get event of the index page
//Route::get('/',array('as'=>'index_page','uses'=>'ImageController@getIndex'));
//This is for the post event of the index.page
//Route::post('/',array('as'=>'index_page_post','before' =>'csrf', 'uses'=>'ImageController@postIndex'));

Route::get('/','ImageController@index');
Route::get('/feed','ImageController@feed');
Route::get('/test2','ImageController@test2');
Route::get('/image','ImageController@image');
Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',
]);
Route::get('/info','ImageController@getP');

//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
//// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
//
//
//Route::controllers([
//    'password' => 'Auth\PasswordController',
//]);