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
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function()
{

	Route::get('/users', 'AdminController@users')->name('admin.users');
	Route::get('/users/{username}', 'AdminController@edit')->name('admin.user.edit');
	Route::post('/users/{user}', 'AdminController@update')->name('admin.user.update');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('/danhsachsanpham', 'sanphamController@index')->name('admin.danhsachsanpham.index');
	Route::get('/danhsachsanpham', 'sanphamController@edit')->name('admin.danhsachsanpham.edit');
	Route::get('/danhsachsanpham', 'sanphamController@create')->name('admin.danhsachsanpham.create');

	Route::get('/danhsachloai', 'loaisanphamController@index')->name('admin.danhsachloai.index');
	Route::get('/danhsachloai', 'loaisanphamController@edit')->name('admin.danhsachloai.edit');
	Route::get('/danhsachloai', 'loaisanphamController@create')->name('admin.danhsachloai.create');
	
	Route::resource('/danhsachsanpham', 'sanphamController');
	Route::resource('/danhsachloai', 'loaisanphamController');

});
// Route::get('/admin/danhsachsanpham', 'sanphamController@index')->name('admin.danhsachsanpham.index');

