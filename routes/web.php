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
Route::get('/fusion', "FordController@index");
Route::get('/redisset', "RedisTestController@redisTest");
Route::get('/mailtest', "TestController@TestSentMail");


//====路由 - 入门
//1 闭包
Route::get('/hello',function () {
    return "welcome to l56xx！";
});

//2


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
