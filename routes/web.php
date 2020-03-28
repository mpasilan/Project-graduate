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
	
	Route::resource('contact', 'ContactController');
	Route::post('contact/send','ContactController@send')->name('send');
	Route::resource('hotel', 'HotelController');
        Route::post('hotel/rooms','HotelController@getdates')->name('hotel.get');
		Route::post('hotel/payment', 'HotelController@paymentdetails')->name('hotel.payment');


Auth::routes();
Route::group(['prefix' => 'admin','middleware' => ['adminrole']], function(){

			Route::get('/', 'HomeController@index')->name('dashboard');
			Route::get('/search', 'HomeController@search')->name('search');
			Route::get('/paid', 'HomeController@showpaid')->name('showpaid');
			Route::POST('/delete', 'HomeController@book_recylebin')->name('soft.destroy');
			Route::POST('confirm', 'HomeController@confirm')->name('conf.bo');
			Route::POST('confirm/payment', 'HomeController@confirm_payment')->name('conf.pa');
			Route::get('/trashed', 'Trashed_bookingsController@index')->name('trashed');
			Route::get('/trashed/search', 'Trashed_bookingsController@search')->name('search.trashed');
			Route::POST('/trashed/res', 'Trashed_bookingsController@booking_recylebin')->name('restore.bo');
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










