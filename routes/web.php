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
    return view('home-page');
});


Auth::routes();
// Change password
Route::get('/changepassword', 'ChangePasswordController@index')->name('changepassword');
Route::post('/changepassword', 'ChangePasswordController@store')->name('changepassword');

Route::get('/home', 'HomeController@index')->name('home');


// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('/users', 'UsersController');
});

// User

Route::namespace('User')->prefix('user')->name('user.')->group(function() {
    Route::resource('/profile', 'ProfileController');
});
// Route::get('user/profile', 'User\ProfileController@index')->name('user.profile.index');
// Route::get('user/profile/create', 'User\ProfileController@create')->name('user.profile.create');
// Route::post('user/profile/store', 'User\ProfileController@store')->name('user.profile.store');
// Route::put('user/profile/{email}','User\ProfileController@update')->name('user.profile.update');
// Route::get('user/profile/{email}/edit', 'User\ProfileController@edit')->name('user.profile.edit');