<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/users', 'HomeController@index');

$api->version('v1', function ($api){
	/*
	 * Routes for Administrator
	 */
	
	//Pools
	//get all pools of the travel
	$api->get('pools', 'App\Http\Controllers\PoolController@index'); 
	$api->post('pool/store','App\Http\Controllers\PoolController@store');
	$api->get('pool/{name}','App\Http\Controllers\PoolController@show');
	$api->post('pool/{id}','App\Http\Controllers\PoolController@update');
	$api->get('pool/image/{pool_name}','App\Http\Controllers\PoolController@getImage');
	$api->delete('pool/{id}','App\Http\Controllers\PoolController@destroy');

	//Routes
	//add new route, attach pool to pool and add duration between pool
	$api->post('route/store', 'App\Http\Controllers\RouteController@store');
	$api->get('route/{id}','App\Http\Controllers\RouteController@show');
	$api->put('route/{id}','App\Http\Controllers\RouteController@update');
	$api->delete('route/{id}','App\Http\Controllers\RouteController@destroy'); 

	//Drivers
	$api->get('drivers','App\Http\Controllers\DriverController@index');
	$api->post('driver/store','App\Http\Controllers\DriverController@store');
	$api->get('driver/{id}','App\Http\Controllers\DriverController@show');
	$api->post('driver/{id}','App\Http\Controllers\DriverController@update');
	$api->delete('driver/{id}','App\Http\Controllers\DriverController@destroy');

	//CarTypes
	$api->get('cartypes','App\Http\Controllers\CarTypecontroller@index');
	$api->post('cartype/store','App\Http\Controllers\CarTypecontroller@store');
	$api->get('cartype/{id}','App\Http\Controllers\CarTypecontroller@show');
	$api->put('cartype/{id}','App\Http\Controllers\CarTypecontroller@update');
	$api->delete('cartype/{id}','App\Http\Controllers\CarTypecontroller@destroy');

	//SeatLayouts
	$api->get('seat_layout/{class_type}','App\Http\Controllers\SeatLayoutController@index');
	$api->post('seat_layout/store','App\Http\Controllers\SeatLayoutController@store');
	$api->put('seat_layout/{id}','App\Http\Controllers\SeatLayoutController@update');
	$api->delete('seat_layout/{id}','App\Http\Controllers\SeatLayoutController@destroy');

	//Cars
	$api->get('cars','App\Http\Controllers\CarController@index');
	$api->post('car/store','App\Http\Controllers\CarController@store');
	$api->get('car/{id}','App\Http\Controllers\CarController@show');
	$api->put('car/{id}','App\Http\Controllers\CarController@update');
	$api->delete('car/{id}','App\Http\Controllers\CarController@destroy');

	//PaymentMethod
	$api->get('paymentMethod','App\Http\Controllers\PaymentMethodController@index');
	$api->get('paymentMethod/{id}', 'App\Http\Controllers\PaymentMethodController@show');
	$api->post('paymentMethod/store', 'App\Http\Controllers\PaymentMethodController@store');
	$api->put('paymentMethod/{id}', 'App\Http\Controllers\PaymentMethodController@update');
	$api->delete('paymentMethod/{id}', 'App\Http\Controllers\PaymentMethodController@destroy');

	//Promotions
	$api->get('promotions', 'App\Http\Controllers\PromotionController@index');
	$api->post('promotion/store', 'App\Http\Controllers\PromotionController@store');		
	$api->get('promotion/{id}', 'App\Http\Controllers\PromotionController@show');
	$api->put('promotion/{id}','App\Http\Controllers\PromotionController@update');
	$api->get('promotion/image/{image_name}', 'App\Http\Controllers\PromotionController@getImage');
	$api->delete('promotion/{id}', 'App\Http\Controllers\PromotionController@destroy');
	
	/*
	 * Public API
	*/
	//Routes
	$api->get('routes','App\Http\Controllers\RouteController@index');
	
	//Pools
	$api->get('{origin}/destinations', 'App\Http\Controllers\PoolController@getDestinations');

	$api->get('origins/{destination}', 'App\Http\Controllers\PoolController@getOrigins');
	
	//Fares
	// get various fare of route
	$api->get('fares/{origin_name}/{destination_name}/{departure_date}','App\Http\Controllers\FareController@getFares');
	// get number of tickets available of a certain fares
	// $api->get('fare/{fare_id}/count_tickets/{departure_date}','App\Http\Controllers\FareController@countTickets');

	// get available car on a certain schedule
	$api->get('fare/{fare_id}/tickets/{departure_date}','App\Http\Controllers\FareController@getTickets');
	// get seat layout of the car
	$api->get('fare/{fare_id}/seat_layout','App\Http\Controllers\FareController@getSeatLayout');	

	//Customer
	$api->post('customer/store','App\Http\Controllers\CustomerController@store');
	$api->get('customer/{email}','App\Http\Controllers\CustomerController@show');

	//Passenger
	$api->get('passengers','App\Http\Controllers\PassengerController@index');
	$api->post('passenger/store','App\Http\Controllers\PassengerController@store');

	//Booking
	$api->post('booking/store','App\Http\Controllers\BookingController@store');

	//Tiket
	$api->post('ticket/store','App\Http\Controllers\TicketController@store');
});
