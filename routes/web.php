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

//guest content
Route::get('/', 'FrontPageController@index')->name('frontpage');
Route::get('/about', 'SupportPageController@index')->name('support');
Route::resource('/services', 'ServicesController');
Route::resource('/reviews', 'ReviewsController');
Route::resource('/leads', 'LeadsController');

//dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/leads', 'DashboardController@leads')->name('leads');
Route::get('/dashboard/reviews', 'DashboardController@reviews')->name('reviews');
Route::get('/dashboard/services', 'DashboardController@services')->name('services');
Route::get('/dashboard/contact', 'DashboardController@contact')->name('contact');
Route::get('/dashboard/pages', 'DashboardController@pages')->name('pages');
Route::get('/dashboard/pages/home', 'DashboardController@pages')->name('home');
Route::get('/dashboard/pages/about', 'DashboardController@pages')->name('about');
