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
    return view('auth.login');
});

Auth::routes();
// Change password
Route::get('/changepassword', 'ChangePasswordController@index')->name('changepassword');
Route::post('/changepassword', 'ChangePasswordController@store')->name('changepassword');

Route::get('/home', 'HomeController@index')->name('home');


// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store', 'delete']]);
});

// User

Route::namespace('User')->prefix('user')->name('user.')->group(function() {
    Route::resource('/profile', 'ProfileController');
});