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
    return redirect('hotel');
});
	Route::resource('hotel', 'HotelController');
	Route::resource('contact', 'ContactController');
	Route::post('hotel/rooms','HotelController@getdates')->name('hotel.get');
	Route::post('hotel/payment', 'HotelController@paymentdetails')->name('hotel.payment');
	

Auth::routes();
Route::group(['prefix' => 'admin','middleware' => ['adminrole']], function(){

			Route::get('/', 'HomeController@index')->name('dashboard');
			Route::get('/search', 'HomeController@search')->name('search');
			Route::get('/paid', 'HomeController@showpaid')->name('showpaid');
			Route::post('/delete', 'HomeController@book_recylebin')->name('soft.destroy');
			Route::get('/trashed', 'Trashed_bookingsController@index')->name('trashed');
			Route::get('/trashed/search', 'Trashed_bookingsController@search')->name('search.trashed');
			Route::resource('manage_users', 'Manage_usersController');
			Route::POST('/saving-credentials','HomeController@updateCreds');
			Route::get('/ticket/{ticketId}','HomeController@ticket');

});

Route::group(['prefix' => 'employee','middleware' => ['employeerole']], function(){

			Route::get('/', 'EmployeeController@index')->name('employee');
			Route::POST('/submit', 'EmployeeController@statusSubmit')->name('submitStatus');
			Route::get('/ticket/{ticketId}','HomeController@ticket');
});

Route::group(['prefix' => 'user','middleware' => ['userrole']], function(){

			Route::get('/', 'UserController@index')->name('user');
			Route::post('/ticket-submit','TicketController@index');
			Route::get('/view-ticket','UserController@viewTicket');
			Route::get('/ticket/{ticketId}','HomeController@ticket');
			

});










