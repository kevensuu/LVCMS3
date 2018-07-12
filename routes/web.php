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


Route::get('/', 'Web\HomeController@show');

Route::get('/newest.html', 'Web\CategoryController@all');
Route::get('/newest_{cpage}.html', 'Web\CategoryController@all')->where('cpage', '[0-9]+');

Route::get('/c/{cid}.html', 'Web\CategoryController@cnewest')->where('cid', '[0-9]+');
Route::get('/c/{cid}_{cpage}.html', 'Web\CategoryController@cnewest')->where(['cid'=>'[0-9]+', 'cpage'=>'[0-9]+']);

Route::get('/a/{aid}.html', 'Web\DetailController@show')->where('aid', '[0-9]+');
Route::get('/a/{aid}_{cpage}.html', 'Web\DetailController@show')->where(['aid'=>'[0-9]+', 'cpage'=>'[0-9]+']);