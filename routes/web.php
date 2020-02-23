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
	Route::post('hotel','HotelController@getdates')->name('hotel.get');
	Route::post('hotel/request','CustomAuthController@guestRegistrationFrom')->name('hotel.book');
	Route::post('hotel/guest','CustomAuthController@register')->name('new.guest');

Auth::routes();
Route::group(['prefix' => 'admin','middleware' => ['adminrole']], function(){

			Route::get('/', 'HomeController@index')->name('dashboard');
			Route::post('/', 'HomeController@store');
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










