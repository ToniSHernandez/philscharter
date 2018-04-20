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
Route::get('/dashboard/leads', 'LeadsController@dashboard')->name('leads');
Route::get('/dashboard/reviews', 'ReviewsController@dashboard')->name('reviews');
Route::get('/dashboard/services', 'ServicesController@dashboard')->name('services');
Route::get('/dashboard/contact', 'DashboardController@contact')->name('contact');
Route::get('/dashboard/pages', 'DashboardController@pages')->name('pages');
Route::get('/dashboard/pages/home', 'DashboardController@pages')->name('home');
Route::get('/dashboard/pages/about', 'DashboardController@pages')->name('about');

Route::post('/addservice', 'ServicesController@store');
Route::post('/addreview', 'ReviewsController@store');

// Resourceful routes
Route::resource('/services', 'ServicesController');
Route::resource('/reviews', 'ReviewsController');
Route::resource('/leads', 'LeadsController');