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

Route::get('/','MainController@index');
Route::get('/feed','MainController@feed');
Route::get('/image/{i}','MainController@showImage');
Route::post('/comment','MainController@commentImage');
Route::get('/searchimage','MainController@searchImage');

Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',
]);
Route::group(['middleware' => 'App\Http\Middleware\Admin'], function()
{
    Route::get('/userinfo','AdminController@userInfo');
    Route::get('/searchuser','AdminController@searchUser');
    Route::post('/deleteuser','AdminController@deleteUser');
    Route::post('/uprank', 'AdminController@upRank');
    Route::post('/downrank','AdminController@downRank');

});
Route::post('/images/upload', 'ImageController@multipleUpload');
Route::get('/myphotos','ImageController@userPhotos');
Route::get('/editimage/{i}','ImageController@editImage');
Route::post('/updateimage/{i}','ImageController@updateImage');
Route::post('/vote','ImageController@vote');
Route::post('/deleteimage','ImageController@deleteImage');




