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

# 相册
Route::get('/albums', 'AlbumController@index')->name('albums.index');
Route::get('/albums/{album}', 'AlbumController@show')->middleware('auth')->name('albums.show');
Route::post('/albums', 'AlbumController@store')->middleware('auth')->name('albums.store');

# 相片
Route::get('/images/create', 'ImageController@create')->middleware('auth')->name('images.create');
Route::post('/images', 'ImageController@store')->middleware('auth')->name('images.store');
