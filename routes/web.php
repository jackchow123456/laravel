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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Admin\LoginController@showLoginForm');
Route::Post('/admin/login', 'Admin\LoginController@login')->name('admin.login');

Route::middleware(['auth.admin:admin'])->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index');
});