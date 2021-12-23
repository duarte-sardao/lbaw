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

// Static Pages
Route::get('/', 'StaticController@index');
Route::get('about', 'StaticController@about');
Route::get('faq', 'StaticController@faq');
Route::get('contact', 'StaticController@contact');

//Other Pages
Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('/store/{id}', function ($id) {
    return 'Product '.$id;
});

// Cart
Route::get('/user/{id}/cart', 'CartController@list', function ($id) {
    return 'User '.$id;
});

Route::put('/user/{id}/cart', 'CartController@create', function ($id) {
    return 'User '.$id;
});
Route::delete('/user/{id}/cart/{prod_id}', 'CardController@delete', function($id, $prod_id) {
	return ('User '.$id, 'Product'.$id);
});
Route::put('/user/{id}/cart/{prod_id}', 'CartElementController@create', function ($id, $prod_id) {
    return ('User '.$id, 'Product'.$id);
});
//Route::post('api/item/{id}', 'ItemController@update');
//Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
