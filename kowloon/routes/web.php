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

// Auth::routes();

//HOME
Route::get('/home', 'HomeController@index');
Route::get('/cookie', 'CookieController@toggleCookie');

//ABOUT
Route::get('/about', 'AboutController@index');
Route::post('/contact', 'AboutController@store');

//CATEGORY
Route::get('category/{id}', 'CategoryController@index');

//PRODUCT DETAIL VIEW
Route::get('category/{category_id}/product/{product_id}', 'ProductDetailController@index');

//FAQ
Route::get('/faq', 'FaqController@index');

//SHARED
Route::post('/subscribe', 'SubscriberController@store');
