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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Auth::routes();
// Change password
Route::get('/changepassword', 'ChangePasswordController@index')->name('changepassword');
Route::post('/changepassword', 'ChangePasswordController@store')->name('changepassword');

Route::get('/home', 'HomeController@index')->name('home');


// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/info-users','ShowInfoController@showinfo')->name('showinfo');
    Route::resource('/users', 'UsersController');
    
});


// User

Route::namespace('User')->prefix('user')->name('user.')->group(function() {
    Route::resource('/profile', 'ProfileController');


});

#---------------------- Student --------------------------
Route::get('area_info', 'StudentController@index')->name('area_info');
Route::get('room_info/{id}', 'StudentController@viewRoom')->name('room_info');
Route::get('regist_room/{id}', 'StudentController@registRoom')->name('regist_room');
Route::get('student_xemdk', 'StudentController@student_xemdk')->name('student_xemdk');
Route::get('view_managers', 'StudentController@view_managers')->name('view_managers');


#----------------------- Manager -------------------------------------
Route::get('manager_duyetdk','ManagerController@index')->name('manager_duyetdk');
Route::get('get_manager_duyetdk/{mssv}','ManagerController@get_manager_duyetdk')->name('get_manager_duyetdk');
Route::get('get_manager_huydk/{mssv}','ManagerController@get_manager_huydk')->name('get_manager_huydk');
Route::get('get_manager_ttsv/{mssv}','ManagerController@get_manager_ttsv')->name('get_manager_ttsv');

#----------------------- Xem thông tin phòng -------------------------
Route::get('manager_qlphong', 'ManagerController@manager_qlphong')->name('manager_qlphong');
Route::get('manager_ttphong/{id}', 'ManagerController@manager_ttphong')->name('manager_ttphong');
Route::get('manager_delete_sv/{mssv}', 'ManagerController@manager_delete_sv')->name('manager_delete_sv');
Route::get('manager_search_sv', 'ManagerController@manager_search_sv')->name('manager_search_sv');
