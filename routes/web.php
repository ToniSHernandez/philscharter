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

//public
Route::get('/', 'FrontPageController@index')->name('frontpage');
Route::get('/about', 'SupportPageController@index')->name('support');
Route::get('/contact', 'SupportPageController@index')->name('support');

//dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::prefix('api/')->name('api.')->namespace('Backend')->group(function () {
    Route::resource('leads', 'LeadsController');
    Route::resource('reviews', 'ReviewsController');
    Route::resource('services', 'ServicesController');
});
