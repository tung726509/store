<?php

use Illuminate\Support\Facades\Route;

// login
Route::get('/login', 'HomeController@login')->name('login');

// home
Route::get('/home', 'HomeController@home')->name('home');

// categories
Route::get('/categories/{code}', 'HomeController@categories')->name('categories');

// productDetail
Route::get('/detail/{product_id}', 'HomeController@productDetail')->name('detail');

// mycart
Route::get('/mycart', 'HomeController@myCart')->name('mycart');

// Route::get('/aboutus', function () {
//     return view('homepage.aboutus.index');
// })->name('aboutus');

// ajax
Route::prefix('ajax')->name('ajax.')->group(function(){
	Route::post('/attach-customer-with-cookie', 'AjaxController@attachCustomerWithCookie')->name('attach_customer_with_cookie');
});