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

Route::get('orm/flight/all','baseEloquentORM\FlightController@all');
Route::get('orm/relation/all','baseEloquentORM\RelationController@all');
Route::get('orm/relation/has_one','baseEloquentORM\RelationController@hasOne');
Route::get('orm/relation/belongs_to_for_has_one','baseEloquentORM\RelationController@belongsToForhasOne');
Route::get('orm/relation/has_many','baseEloquentORM\RelationController@hasMany');
Route::get('orm/relation/belongs_to_for_has_many','baseEloquentORM\RelationController@belongsToForHasMany');
