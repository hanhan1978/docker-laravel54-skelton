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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@show');
Route::get('/test_mysql_10000', 'TestController@show_mysql_10000');
Route::get('/test_super_cache_10000', 'TestController@show_super_cache_10000');
