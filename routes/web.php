<?php
use App\Passenger;
use App\Buses;
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
    $bus = DB::table('buses')->get();
    $seats = DB::table('seats')->get();
    return view('welcome', ['bus' => $bus,'seats' => $seats]);
});

Route::get('booking/{bus_id}', function($bus_id)
{
      $seats = DB::table('seats')->get();
    $bus = DB::table('buses')->where('bus_id', $bus_id)->get();
       return view('booking', ['bus' => $bus,'seats' => $seats]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reciept', 'PassengerController@indexnew')->name('reciept');
Route::get('ticket', function () {
    return view('ticket');
});
Route::post('/search','PassengerController@search');


// Operator Routes
Route::Resource('operator', 'OperatorController');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//  Bus Route
Route::Resource('bus','BusController');

Route::post('destroy','BusController@destroy');
Route::get('edit-records','BusController@index');
Route::get('edit/{bus_id}','BusController@show');
Route::post('edit','BusController@edit');
Route::post('/store','BusController@store');

Route::Resource('user', 'UserController');

Route::Resource('driver', 'DriverController');
Route::post('addarrival/{bus_id}', 'DriverController@addarrival');
Route::post('savestop', 'DriverController@savestop');


Route::get('list', 'Profile@index');
Route::get('passenger', 'PassengerController@index');
Route::post('editpayment', 'PassengerController@editpayment');
Route::post('deletepass', 'PassengerController@deletepass');

Route::get('terminal', 'TerminalController@index');
Route::post('addterm', 'TerminalController@addterm');
Route::post('editterm', 'TerminalController@editterm');
Route::post('deleteterm', 'TerminalController@deleteterm');

Route::post('addpass', 'Profile@addpass');
Route::post('booking/addpass', 'Profile@addpass');
Route::post('adduser', 'Profile@adduser');
Route::post('edituser', 'Profile@edituser');
Route::post('deleteuser', 'Profile@deleteuser');
Route::post('pass', 'Profile@pass');




Route::post('deleteoperator','OperatorController@deleteoperator');
Route::get('edit-records','OperatorController@index');
Route::get('editoperator/{operator_id}','OperatorController@show');
Route::post('editoperator/{operator_id}','OperatorController@editoperator');
//  Region Route
Route::Resource('region','RegionController');


//  Sub Region Route
Route::Resource('sub-region','Sub_RegionController');

