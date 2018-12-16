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


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->middleware('guest:admin');
Route::Post('/admin/login', 'Admin\LoginController@login')->middleware('guest:admin')->name('admin.login');
Route::Post('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::middleware(['auth.admin:admin'])->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index');
});