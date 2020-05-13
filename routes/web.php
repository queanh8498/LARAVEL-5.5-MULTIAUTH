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

Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/san-pham', 'FrontendController@product')->name('frontend.product');
//Tạo trang Chi tiết Sản phẩm (product-detail)
Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');

//trang Liên hệ
Route::get('/lien-he', 'FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/goi-loi-nhan', 'FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');


//Tạo trang thanh toán (checkout)
Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');

//Tạo đơn hàng và gởi mail xác nhận
Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'FrontendController@orderFinish')->name('frontend.orderFinish');

Route::get('setLocale/{locale}', function ($locale) {
	if (in_array($locale, Config::get('app.locales'))) {
	  Session::put('locale', $locale);
	}
	return redirect()->back();
})->name('app.setLocale');

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

	Route::get('/danhsachdonhang', 'donhangController@index')->name('admin.danhsachdonhang.index');
	Route::get('/admin/danhsachdonhang/active{id}', 'donhangController@active')->name('danhsachdonhang.active');

	// Tạo route Báo cáo Đơn hàng
	Route::get('/baocao/donhang', 'baocaoController@donhang')->name('admin.baocao.donhang');
	Route::get('/baocao/donhang/data', 'baocaoController@donhangData')->name('admin.baocao.donhang.data');

	Route::resource('/danhsachsanpham', 'sanphamController');
	Route::resource('/danhsachloai', 'loaisanphamController');
	Route::resource('/danhsachdonhang', 'donhangController');

});
// Route::get('/admin/danhsachsanpham', 'sanphamController@index')->name('admin.danhsachsanpham.index');

