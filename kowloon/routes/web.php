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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect']], function() {
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

    //SEARCH
    Route::get('/search', 'SearchController@index');
});

//SHARED
Route::post('/subscribe', 'SubscriberController@store');

Route::group(['middleware' => 'auth'], function() {
    //HOTITEMS
    Route::post('/admin/hotitems', 'AdminController@updateHotItem');
    Route::get('/admin/dashboard', 'AdminController@index');
    //PRODUCTS
    Route::get('/admin/products', 'ProductController@index');
    Route::get('/admin/products/create', 'ProductController@create');
    Route::post('/admin/products/create', 'ProductController@store');
    Route::get('/admin/products/{id}/edit', 'ProductController@edit');
    Route::post('/admin/products/{id}/edit', 'ProductController@update');
    Route::post('/admin/products/{id}/delete', 'ProductController@destroy');
    //FAQS
    Route::get('/admin/faqs', 'FaqController@indexAdminFaqs');
    Route::get('/admin/faqs/create', 'FaqController@create');
    Route::post('/admin/faqs/create', 'FaqController@store');
    Route::post('/admin/faqs/{id}/edit', 'FaqController@update');
    Route::get('/admin/faqs/{id}/edit', 'FaqController@edit');
    Route::post('/admin/faqs/{id}/delete', 'FaqController@destroy');
});
