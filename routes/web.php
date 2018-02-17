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
    return view('welcome');
});

Auth::routes();
Route::get('/loginusers', 'auth\LoginController@loginusers');
Route::post('/userlogin', 'auth\LoginController@authenticate');


Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));








Route::get('/ordernewfuel', 'Order\OrderFuelController@create')->middleware('auth');
Route::get('/orderfuelcity', 'Order\OrderCityFuelController@create')->middleware('auth');

Route::get('/newvehicleservice', 'Order\VehicleserviceController@create')->middleware('auth');




Route::group(['middleware' => 'auth','prevent-back-history'], function() {

Route::resource('suppliers','Resource\SuppliersController');
Route::resource('garages','Resource\GaragesController');
Route::resource('fuelstations','Resource\FuelStationController');
Route::resource('fueltypes','Resource\FuelTypeandPrices');
Route::resource('vehicletypes','Resource\VehicleTypesController');
Route::resource('vehicledrivers','Resource\VehicleDriversController');
Route::resource('vehicleinfos','Resource\VehicleInfoController');
Route::resource('fuelorders','Order\OrderFuelController');
Route::resource('cityfuelorders','Order\OrderCityFuelController');
Route::resource('vehicleservice','Order\VehicleserviceController');
Route::resource('/vehiclemovement', 'Record\VehiclemovementController');
Route::resource('/cityvehiclemovement', 'Record\CityVehiclemovementController');

Route::resource('/changepword', 'Resource\ChangePasswordController');

Route::resource('/abysiniacards', 'Resource\AddAbysiniaCard');
Route::resource('/roles', 'Resource\UserControllerHome');
Route::resource('/vehiclehandovers', 'VehiclehandoverController');


Route::get('/abysiniahome', 'Resource\AddAbysiniaCard@index')->middleware('prevent-back-history');

Route::get('/newabysiniacard', 'Resource\AddAbysiniaCard@create')->middleware('prevent-back-history');

Route::get('/home', 'HomeController@index')->middleware('prevent-back-history');

Route::get('/vehiclehandover', 'VehiclehandoverController@index')->middleware('prevent-back-history');

Route::get('/newvehiclehandover', 'VehiclehandoverController@create')->middleware('prevent-back-history');
Route::get('/vehicleservicehome', 'Order\VehicleserviceController@index')->middleware('prevent-back-history');
Route::get('/orderfuelhome', 'Order\OrderFuelController@index')->middleware('prevent-back-history');
Route::get('/orderfuelcityhome', 'Order\OrderCityFuelController@index')->middleware('prevent-back-history');


Route::get('/vehiclemovhome', 'Record\VehiclemovementController@index')->middleware('prevent-back-history');
Route::get('/cityvehiclemovhome', 'Record\CityVehiclemovementController@index')->middleware('prevent-back-history');

Route::get('/newvehiclemov', 'Record\VehiclemovementController@create')->middleware('prevent-back-history');
Route::get('/newcityvehiclemov', 'Record\CityVehiclemovementController@create')->middleware('prevent-back-history');

Route::get('/vehiclemovreports', 'Record\VehiclemovementController@display')->middleware('prevent-back-history');
Route::get('/vehicleservicereports', 'Order\VehicleserviceController@display')->middleware('prevent-back-history');

Route::post('/pwordreset', 'Resource\UserControllerHome@resetpword');
Route::get('/roles', 'Resource\UserControllerHome@roledefinition')->middleware('prevent-back-history');
Route::get('/search', 'SearchController@search')->middleware('prevent-back-history');
Route::get('/searchgarage', 'SearchController@searchgarage')->middleware('prevent-back-history');
Route::get('/searchfuelstation', 'SearchController@fuelstation')->middleware('prevent-back-history');
Route::get('/searchfuelprice', 'SearchController@fuelprice')->middleware('prevent-back-history');
Route::get('/searchvehicletypes', 'SearchController@vehicletypes')->middleware('prevent-back-history');
Route::get('/searchdriver', 'SearchController@vehicledrivers')->middleware('prevent-back-history');
Route::get('/searchvehicle', 'SearchController@vehicleinfo')->middleware('prevent-back-history');
Route::get('/searchvehiclemovements', 'SearchController@vehiclemov')->middleware('prevent-back-history');
Route::get('/searchcityvehiclemovements', 'SearchController@cityvehiclemov')->middleware('prevent-back-history');
Route::get('/searchfuelorder', 'SearchController@searchfuelorder')->middleware('prevent-back-history');
Route::get('/searchcityfuelorder', 'SearchController@searchcityfuelorder')->middleware('prevent-back-history');
Route::get('/searchvehiclehandover', 'SearchController@searchvehiclehandover')->middleware('prevent-back-history');


Route::get('/changepassword', 'Resource\ChangePasswordController@create')->middleware('prevent-back-history');
Route::get('/listsuppliers', 'Resource\SuppliersController@show')->middleware('prevent-back-history');

Route::post('/vehiclemovementsreport', 'Report\ReportController@vehiclemovement')->middleware('prevent-back-history');
Route::post('/vehicleservicesreport', 'Report\ReportController@vehicleservice')->middleware('prevent-back-history');



Route::get('/registerusers', 'auth\RegisterController@createuser')->middleware('prevent-back-history');
Route::post('/registerusers', 'auth\RegisterController@store');

Route::get('/newsuppliers', 'Resource\SuppliersController@create')->middleware('prevent-back-history');
Route::get('/supedit', 'Resource\SuppliersController@create')->middleware('prevent-back-history');
Route::get('/newgarage', 'Resource\GaragesController@create')->middleware('prevent-back-history');
Route::get('/garedit', 'Resource\GaragesController@create')->middleware('prevent-back-history');

Route::get('/newfuelstation', 'Resource\FuelStationController@create')->middleware('prevent-back-history');

Route::get('/newfuelprice', 'Resource\FuelTypeandPrices@create')->middleware('prevent-back-history');
Route::get('/fueltypeedit', 'Resource\FuelTypeandPrices@create')->middleware('prevent-back-history');
Route::get('/newvehicletypes', 'Resource\VehicleTypesController@create')->middleware('prevent-back-history');
Route::get('/newvehicledrivers', 'Resource\VehicleDriversController@create')->middleware('prevent-back-history');
Route::get('/newvehicleinfo', 'Resource\VehicleInfoController@create')->middleware('prevent-back-history');
Route::get('/vehcilemaintainance', 'Record\VehicleMaintainancemade@create')->middleware('prevent-back-history');




Route::get('search',array('as'=>'search','uses'=>'SearchController@search'))->middleware('prevent-back-history');

Route::get('/suphome', 'Resource\SuppliersController@index')->middleware('prevent-back-history');
Route::get('/garagehome', 'Resource\GaragesController@index')->middleware('prevent-back-history');
Route::get('/FuelStation', 'Resource\FuelStationController@index')->middleware('prevent-back-history');
Route::get('/FuelTypesandPrice', 'Resource\FuelTypeandPrices@index')->middleware('prevent-back-history');
Route::get('/Vehicle Types', 'Resource\VehicleTypesController@index')->middleware('prevent-back-history');
Route::get('/Vehicle Drivers', 'Resource\VehicleDriversController@index')->middleware('prevent-back-history');
Route::get('/vehicleinfohome', 'Resource\VehicleInfoController@index')->middleware('prevent-back-history');
Route::get('/rolehome', 'Resource\UserControllerHome@index')->middleware('prevent-back-history');
Route::get('/userrole', 'Resource\UserControllerHome@userrole')->middleware('prevent-back-history');
Route::get('/assignrole', 'Resource\UserControllerHome@create')->middleware('prevent-back-history');
Route::get('/roleedit', 'Resource\UserControllerHome@edit')->middleware('prevent-back-history');
Route::get('/passwordreset', 'Resource\UserControllerHome@resetpassword')->middleware('prevent-back-history');

});



Route::group(['middleware' => 'auth'], function() {


});

