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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/', 'HomeController@show');
Route::get('/home', 'HomeController@show');
Route::post('home', 'HomeController@AddPost');
Route::post('home/{id}', 'HomeController@AddComment');
Route::post('posts/{id}', 'Postcontroller@show');
Route::get('posts/{id}', 'PostController@show');
Route::post('posts/{id}', 'PostController@AddComment');
Route::get('profile/{id}', 'ProfileController@show');
Route::post('profile/{id}', 'ProfileController@show');
Route::post('profile/{user_id}/{id}', 'HomeController@AddComment');

