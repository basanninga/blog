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

Auth::routes();

Route::get('/home', 'HomeController@home');
Route::get('/', 'HomeController@home');


Route::group(['middleware' => 'auth'], function(){

    Route::get('/post/{slug}', 'PostController@post');
    Route::delete('/post/{post}', 'PostController@destroy');
    Route::get('/create_post', 'PostController@create');
    Route::post('/create_post', 'PostController@store');
    Route::post('/post/{slug}', 'CommentController@store');
});
