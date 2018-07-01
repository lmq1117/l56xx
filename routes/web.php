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

#演示CSRF
#不带token字段的表单
Route::get('from_with_out_csrf_token', function () {
    return '<form method="POST" action="hello_from_form">
            <button type="submit">提交</button>
            </form>';
});

#带token字段的表单
Route::get('from_with_csrf_token', function () {
    return '<form method="POST" action="hello_from_form">
                ' . csrf_field() . '
                <button type="submit">提交</button>
            </form>';
});

#action Route
Route::post('hello_from_form', function () {
    return 'hello laravel csrf token!';
});