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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/configuracion', 'UserController@config')->name('config')->middleware('auth');
Route::post('/configuration', 'UserController@update')->name('putConfig')->middleware('auth');
Route::get('/user/avatar/{image_path}', 'UserController@getImage')->name('userAvatar')->middleware('auth');

//ruta de las imagenes
Route::resource('/imagenes', 'ImageController');
Route::get('/image/file/{image_path}', 'ImageController@getImage')->name('imageFile');
