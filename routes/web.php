<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|class="navbar-expand-md" style="margin-left:-12%;width:123%;
*/

Route::get('/','HotelsController@home');
Route::get('/services','HomeController@services');
Route::get('/about','HomeController@about');
Route::resource('hotels','HotelsController');
Route::resource('reservations','ReservationsController');
Route::resource('search','SearchController');
Route::get('/homepage','HotelsController@home');
Route::get('/hotels/{id}/delete','HotelscController@destroy');
Auth::routes();
Route::get('reservations/{id}/show','ReservationsController@show');
Route::get('/home', 'HomeController@index')->name('home');
