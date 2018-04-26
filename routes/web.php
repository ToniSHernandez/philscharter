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
Route::get('/trips-rates/{slug}','ShowServiceController@show');
Route::get('/trip-request','TripRequestController@create');
Route::view('/contact', 'contact');
Route::view('/about', 'about');
Route::view('/trips-rates','StaticPages.services');

//dashboard
Route::view('/dashboard', 'dashboard')->middleware('auth');

Route::prefix('api/')->name('api.')->namespace('Backend')->group(function () {
    Route::resource('leads', 'LeadsController');
    Route::resource('reviews', 'ReviewsController');
    Route::resource('services', 'ServicesController');
    Route::get('featured-services', 'PopularServiceController@index');
    Route::resource('service-requests', 'ServiceRequestsController');
});

