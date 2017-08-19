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

    //SHARED
    Route::post('/subscribe', 'SubscriberController@store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('admin/dashboard', 'AdminController@index');
    Route::get('admin/products', 'ProductController@index');
    Route::post('admin/products/create', 'ProductController@store');
    Route::get('admin/products/{id}', 'ProductController@show');
    Route::get('admin/products/{id}/edit', 'ProductController@edit');
    Route::post('admin/products/{id}/edit', 'ProductController@update');
    Route::post('admin/products/{id}/delete', 'ProductController@destroy');
    Route::get('admin/questions', 'QuestionController@index');
    Route::post('admin/questions/create', 'QuestionController@store');
    Route::post('admin/questions/{id}/edit', 'QuestionController@update');
    Route::get('admin/questions/{id}', 'QuestionController@show');
    Route::get('admin/questions/{id}/edit', 'QuestionController@edit');
    Route::post('admin/questions/{id}/delete', 'QuestionController@destroy');
});
