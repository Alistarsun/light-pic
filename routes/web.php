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
Route::get('/albums', 'HomeController@album')->name('albums');

Route::get('/upload', 'UploadController@uploadPage')->middleware('auth')->name('upload-page');
Route::post('/upload', 'UploadController@saveImage')->middleware('auth')->name('save-image');

Route::post('/albums', 'AlbumController@store')->middleware('auth')->name('albums.store');
