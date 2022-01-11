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
//Route::get('admins', 'AdminController@showProfile')->name('showAdminProfile');
Route::get('admin/users', 'AdminController@userManagementArea')->name('userManagementArea');
Route::get('admin/orders', 'AdminController@orderManagementArea')->name('orderManagementArea');
Route::get('admin/products', 'AdminController@productManagementArea')->name('productManagementArea');

//! Users
Route::get('users', 'UserController@showProfile')->name('profile');
Route::delete('users', 'UserController@delete')->name('deleteProfile');
Route::post('users/edit/{id}', 'UserController@updateProfile');
Route::get('users/orders', 'UserController@showOrders')->name('showOrders');
//Route::get('users/notifications', 'UserController@showNotifications')->name('showNotifications');

//! Cart
Route::get('users/cart', 'CartController@show')->name('showCart');
Route::delete('users/cart', 'CartController@empty')->name('emptyCart');

Route::get('users/cart/checkout', 'CartController@checkout')->name('checkout');

Route::put('users/cart/{product_id}', 'CartController@addEntry');
Route::delete('users/cart/{product_id}', 'CartController@deleteEntry');
Route::post('users/cart/{product_id}/increment', 'CartController@incrementQuantity');
Route::post('users/cart/{product_id}/decrement', 'CartController@decrementQuantity');

//! Wishlist
Route::get('users/wishlist', 'WishlistController@showWishlist')->name('showWishlist');
Route::delete('users/wishlist', 'WishlistController@empty')->name('emptyWishlist');
Route::delete('users/wishlist/empty', 'WishlistController@empty')->name('emptyWishlist');
Route::put('users/wishlist/product/{product_id}', 'WishlistController@addEntry');
Route::delete('users/wishlist/product/{product_id}', 'WishlistController@deleteEntry');

//! Addresses
Route::get('users/addresses', 'AddressController@showAddresses')->name('showAddresses');
Route::get('users/addresses/new', 'AddressController@showAddressForm')->name('newAddress');
Route::post('users/addresses/new', 'AddressController@addEntry');
Route::delete('users/addresses/{address_id}', 'AddressController@deleteEntry');

//! Orders

//! Products
Route::get('products', 'ProductController@getAllProducts')->name('allProducts');
Route::get('products/{id}', 'ProductController@showProduct');
Route::post('products/search', 'ProductController@search')->name('search');
Route::get('products/categories/{category}', 'ProductController@getCategoryProducts');
