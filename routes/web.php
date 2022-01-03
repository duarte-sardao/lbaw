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

//! Home
Route::get('/', 'HomeController@home')->name('home');

//! Static Pages
Route::get('about', 'StaticController@about')->name('about');
Route::get('faq', 'StaticController@faq')->name('faq');
Route::get('contacts', 'StaticController@contacts')->name('contacts');

//! Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//!Admin Profile
Route::get('/admins/{id}', 'AdminController@showProfile');

//!Customer Profile
Route::get('users', 'UserController@showProfile')->name('profile');
Route::delete('users', 'UserController@delete')->name('deleteProfile');

Route::get('/users/edit', 'UserController@editProfile')->name('editProfile');
Route::post('/users/edit', 'UserController@updateProfile');

Route::get('/users/addresses', 'CustomerController@showAddresses')->name('addresses');
Route::get('/users/orders', 'CustomerController@showOrders')->name('orders');
Route::get('/users/wishlist', 'CustomerController@showWishlist')->name('wishlist');
Route::get('/users/cart', 'CustomerController@showCart')->name('cart');

//!Other Pages

//!Cart
/* Route::get('/user/{id}/cart', 'CartController@list');

Route::put('/user/{id}/cart', 'CartController@add');

Route::delete('/user/{id}/cart', 'CartController@delete'); */
