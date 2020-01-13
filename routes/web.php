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

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>'admin'], function(){
	Route::resource('/user','UsersController');
	Route::resource('/rooms','RoomsController');
	Route::resource('/booking','BookingController');
	Route::get('/','BookingController@lists')->name('list');
	Route::post('/filter','BookingController@filter')->name('filter');
	Route::get('/booking/select/{id}','BookingController@select')->name('select');
	Route::post('/booking/checkdate','JsonsController@checkdate')->name('checkdate');
	Route::post('/booking/select/store','BookingController@store')->name('store');
	Route::get('/booking/view/{id}','BookingController@view')->name('view');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/logout', 'AuthController@logout')->name('logout');
	Route::resource('/bookings', 'HomeController');
	Route::get('/','HomeController@lists')->name('lists');
	Route::post('/filters','HomeController@filter')->name('filters');
	Route::get('/bookings/select/{id}','HomeController@select')->name('selects');
	Route::post('/bookings/checkdate','JsonsController@checkdate')->name('checkdate');
	Route::post('/bookings/select/store','HomeController@store')->name('store');
	Route::get('/bookings/view/{id}','HomeController@view')->name('views');
});

Route::group(['middleware' => 'guest'], function(){
	Route::get('/register', 'AuthController@registerForm');
	Route::post('/register', 'AuthController@register')->name('register');
	Route::get('/login', 'AuthController@loginForm')->name('login');
	Route::post('/login', 'AuthController@login');
});