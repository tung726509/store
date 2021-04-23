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
	Route::get('/get-customer-by-phone', 'AjaxController@getCustomerByPhone')->name('get_customer_by_phone');
});