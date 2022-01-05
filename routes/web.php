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

//! Admins
Route::get('/admins/{id}', 'AdminController@showProfile');

//! Users
Route::get('users', 'UserController@showProfile')->name('profile');
Route::delete('users', 'UserController@delete')->name('deleteProfile');

Route::post('/users/edit/{id}', 'UserController@updateProfile');

Route::get('/users/addresses', 'CustomerController@showAddresses')->name('showAddresses');
Route::get('/users/orders', 'CustomerController@showOrders')->name('showOrders');
Route::get('/users/notifications', 'CustomerController@showNotifications')->name('showNotifications');

//! Cart
Route::get('/users/cart', 'CartController@show')->name('showCart');
Route::delete('/users/cart', 'CartController@empty')->name('emptyCart');

Route::put('/users/cart/{product_id}', 'CartController@addEntry');
Route::delete('/users/cart/{product_id}', 'CartController@deleteEntry');
Route::post('/users/cart/{product_id}', 'CartController@incrementQuantity');

Route::get('users/cart/checkout', 'CartController@checkout')->name('checkout');

//! Wishlist
Route::get('/users/wishlist', 'WishlistController@showWishlist')->name('showWishlist');
Route::put('/users/wishlist/{product_id}', 'WishlistController@add')->name('addToWishlist');

//! Products
Route::get('products', 'ProductController@getAllProducts')->name('allProducts');
//Route::get('products/categories/{category}', 'ProductController@getCategoryProducts');
Route::get('products/search', 'ProductController@search')->name('search');

Route::get('products/{id}', 'ProductController@showProduct')->name('productPage');
Route::put('products/{id}', 'ProductController@addToWishlist')->name('addToWishlist');
