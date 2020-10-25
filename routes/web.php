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
// Change password
Route::get('/changepassword', 'ChangePasswordController@index')->name('changepassword');
Route::post('/changepassword', 'ChangePasswordController@store')->name('changepassword');

Route::get('/home', 'HomeController@index')->name('home');
