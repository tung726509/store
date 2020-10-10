<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/home', 'HomeController@home')->name('home');
// categories
Route::get('/categories/{code}', 'HomeController@categories')->name('categories');
// detail
Route::get('/detail/{product_id}', 'HomeController@productDetail')->name('detail');

// Route::get('/detail/{product_id}', 'HomeController@productDetail')->middleware('cors')->name('detail');
// Route::get('/home', function () {
//     return view('homepage.home.index');
// })->name('home');

// Route::get('/categories', function () {
//     return view('homepage.categories.index');
// })->name('categories');

// Route::get('/detail', function () {
//     return view('homepage.detail.index');
// })->name('detail_product');

Route::get('/mycart', function () {
    return view('homepage.mycart.index');
})->name('mycart');

// Route::get('/aboutus', function () {
//     return view('homepage.aboutus.index');
// })->name('aboutus');
