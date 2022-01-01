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

Auth::routes();

// Home
Route::get('/', 'HomeController@home')->name('home');

// Static Pages
Route::get('about', 'StaticController@about')->name('about');
Route::get('faq', 'StaticController@faq')->name('faq');
Route::get('contacts', 'StaticController@contacts')->name('contacts');

// Authentication
/* 
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('register', 'Auth\RegisterController@register'); */

//Admin Profile
Route::get('/admins/{id}', 'AdminController@showProfile');

//Customer Profile
Route::get('/customers/{id}', 'CustomerController@showProfile')->name('customerProfile');
Route::delete('/customers/{id}', 'CustomerController@delete')->name('delete');

Route::get('/customers/{id}/edit', 'CustomerController@editProfile')->name('editProfile');
Route::post('/customers/{id}/edit', 'CustomerController@updateProfile');

Route::get('/customers/{id}/addresses', 'CustomerController@showAddresses')->name('addresses');
Route::get('/customers/{id}/orders', 'CustomerController@showOrders')->name('orders');
Route::get('/customers/{id}/wishlist', 'CustomerController@showWishlist')->name('wishlist');
Route::get('/customers/{id}/cart', 'CustomerController@showCart')->name('cart');

//Other Pages

/* Route::get('/store/{id}', function ($id) {
    return 'Product '.$id;
}); */

// Cart
Route::get('/user/{id}/cart', 'CartController@list');

Route::put('/user/{id}/cart', 'CartController@add');

Route::delete('/user/{id}/cart', 'CartController@delete');

//Route::post('api/item/{id}', 'ItemController@update');
//Route::delete('api/item/{id}', 'ItemController@delete');
