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

Route::get('/','MainController@index');
Route::get('/feed','MainController@feed');
Route::get('/image/{i}','MainController@showImage');
Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',
]);
Route::group(['middleware' => 'App\Http\Middleware\Admin'], function()
{
    Route::get('/userinfo','AdminController@userInfo');
    Route::post('/deleteuser','AdminController@deleteUser');
    Route::post('/uprank', 'AdminController@upRank');
    Route::post('/downrank','AdminController@downRank');
    Route::post('/searchuser','AdminController@searchUser');

});
Route::post('/images/upload', 'ImageController@multipleUpload');
Route::get('/myphotos','ImageController@userPhotos');
Route::post('/comment','MainController@commentImage');
Route::post('/vote','ImageController@vote');



