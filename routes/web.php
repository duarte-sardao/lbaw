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
Route::get('admin/users', 'AdminController@userManagementArea')->name('userManagementArea');
Route::get('admin/orders', 'AdminController@orderManagementArea')->name('orderManagementArea');
Route::get('admin/products', 'AdminController@productManagementArea')->name('productManagementArea');

//! Users
Route::get('users', 'UserController@show')->name('profile');
Route::delete('users', 'UserController@delete')->name('deleteProfile');
Route::post('users/edit/{id}', 'UserController@update');

//! Cart
Route::get('users/cart', 'CartController@show')->name('cart');
Route::delete('users/cart', 'CartController@empty')->name('emptyCart');
Route::get('users/cart/checkout', 'CartController@checkout')->name('checkout');
Route::put('users/cart/{product_id}', 'CartController@add');
Route::delete('users/cart/{product_id}', 'CartController@delete');
Route::post('users/cart/{product_id}/increment', 'CartController@incrementQuantity');
Route::post('users/cart/{product_id}/decrement', 'CartController@decrementQuantity');

//! Wishlist
Route::get('users/wishlist', 'WishlistController@show')->name('wishlist');
Route::delete('users/wishlist', 'WishlistController@empty')->name('emptyWishlist');
Route::put('users/wishlist/product/{product_id}', 'WishlistController@add');
Route::delete('users/wishlist/product/{product_id}', 'WishlistController@delete');

//! Addresses
Route::get('users/addresses', 'AddressController@show')->name('addresses');
Route::get('users/addresses/new', 'AddressController@showAddressForm')->name('newAddress');
Route::post('users/addresses/new', 'AddressController@add');
Route::delete('users/addresses/{address_id}', 'AddressController@delete');

//! Orders
Route::get('users/orders', 'UserController@showOrders')->name('orders');

//! Notifications 
//Route::get('users/notifications', 'NotificationController@show')->name('notifications');

//! Products
Route::get('products', 'ProductController@getAllProducts')->name('allProducts');
Route::get('products/{id}', 'ProductController@showProduct');
Route::post('products/search', 'ProductController@search')->name('search');
Route::get('products/categories/{category}', 'ProductController@getCategoryProducts');
