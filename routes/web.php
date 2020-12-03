<?php

use Illuminate\Support\Facades\Route;

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

Route::get('gw_login', function () {
    return view('gw_login.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 入国管理局
Route::get('/rgst/immigration', 'ImmigrationController@index');
Route::get('/rgst/immigration/add', 'ImmigrationController@add');
Route::post('/rgst/immigration/add', 'ImmigrationController@create');
Route::get('/rgst/immigration/edit', 'ImmigrationController@edit');
Route::post('/rgst/immigration/edit', 'ImmigrationController@update');
Route::get('/rgst/immigration/del', 'ImmigrationController@delete');
Route::post('/rgst/immigration/del', 'ImmigrationController@remove');
Route::post('/rgst/immigration/get_items', 'ImmigrationController@get_items');
Route::get('/rgst/immigration/export_csv', 'ImmigrationController@export_csv');
// 航空会社
Route::get('/rgst/airline', 'AirlineController@index');
Route::get('/rgst/airline/add', 'AirlineController@add');
Route::post('/rgst/airline/add', 'AirlineController@create');
Route::get('/rgst/airline/edit', 'AirlineController@edit');
Route::post('/rgst/airline/edit', 'AirlineController@update');
Route::get('/rgst/airline/del', 'AirlineController@delete');
Route::post('/rgst/airline/del', 'AirlineController@remove');
Route::post('/rgst/airline/get_items', 'AirlineController@get_items');
Route::get('/rgst/airline/export_csv', 'AirlineController@export_csv');
// 空港
Route::get('/rgst/airport', 'AirportController@index');
Route::get('/rgst/airport/add', 'AirportController@add');
Route::post('/rgst/airport/add', 'AirportController@create');
Route::get('/rgst/airport/edit', 'AirportController@edit');
Route::post('/rgst/airport/edit', 'AirportController@update');
Route::get('/rgst/airport/del', 'AirportController@delete');
Route::post('/rgst/airport/del', 'AirportController@remove');
Route::post('/rgst/airport/get_items', 'AirportController@get_items');
Route::get('/rgst/airport/export_csv', 'AirportController@export_csv');
// 車両情報
Route::get('/rgst/car', 'CarController@index');
Route::get('/rgst/car/add', 'CarController@add');
Route::post('/rgst/car/add', 'CarController@create');
Route::get('/rgst/car/edit', 'CarController@edit');
Route::post('/rgst/car/edit', 'CarController@update');
Route::get('/rgst/car/del', 'CarController@delete');
Route::post('/rgst/car/del', 'CarController@remove');
Route::post('/rgst/car/get_items', 'CarController@get_items');
Route::get('/rgst/car/export_csv', 'CarController@export_csv');
// 会社
Route::get('/rgst/company', 'CompanyController@index');
Route::get('/rgst/company/add', 'CompanyController@add');
Route::post('/rgst/company/add', 'CompanyController@create');
Route::get('/rgst/company/edit', 'CompanyController@edit');
Route::post('/rgst/company/edit', 'CompanyController@update');
Route::get('/rgst/company/del', 'CompanyController@delete');
Route::post('/rgst/company/del', 'CompanyController@remove');
Route::post('/rgst/company/get_items', 'CompanyController@get_items');
Route::get('/rgst/company/export_csv', 'CompanyController@export_csv');
// 国
Route::get('/rgst/country', 'CountryController@index');
Route::get('/rgst/country/add', 'CountryController@add');
Route::post('/rgst/country/add', 'CountryController@create');
Route::get('/rgst/country/edit', 'CountryController@edit');
Route::post('/rgst/country/edit', 'CountryController@update');
Route::get('/rgst/country/del', 'CountryController@delete');
Route::post('/rgst/country/del', 'CountryController@remove');
Route::post('/rgst/country/get_items', 'CountryController@get_items');
Route::get('/rgst/country/export_csv', 'CountryController@export_csv');
// 税関
Route::get('/rgst/custom', 'CustomController@index');
Route::get('/rgst/custom/add', 'CustomController@add');
Route::post('/rgst/custom/add', 'CustomController@create');
Route::get('/rgst/custom/edit', 'CustomController@edit');
Route::post('/rgst/custom/edit', 'CustomController@update');
Route::get('/rgst/custom/del', 'CustomController@delete');
Route::post('/rgst/custom/del', 'CustomController@remove');
Route::post('/rgst/custom/get_items', 'CustomController@get_items');
Route::get('/rgst/custom/export_csv', 'CustomController@export_csv');
// ホテル
Route::get('/rgst/hotel', 'HotelController@index');
Route::get('/rgst/hotel/add', 'HotelController@add');
Route::post('/rgst/hotel/add', 'HotelController@create');
Route::get('/rgst/hotel/edit', 'HotelController@edit');
Route::post('/rgst/hotel/edit', 'HotelController@update');
Route::get('/rgst/hotel/del', 'HotelController@delete');
Route::post('/rgst/hotel/del', 'HotelController@remove');
Route::post('/rgst/hotel/get_items', 'HotelController@get_items');
Route::get('/rgst/hotel/export_csv', 'HotelController@export_csv');
// 港
Route::get('/rgst/port', 'PortController@index');
Route::get('/rgst/port/add', 'PortController@add');
Route::post('/rgst/port/add', 'PortController@create');
Route::get('/rgst/port/edit', 'PortController@edit');
Route::post('/rgst/port/edit', 'PortController@update');
Route::get('/rgst/port/del', 'PortController@delete');
Route::post('/rgst/port/del', 'PortController@remove');
Route::post('/rgst/port/get_items', 'PortController@get_items');
Route::get('/rgst/port/export_csv', 'PortController@export_csv');
// 検疫
Route::get('/rgst/quarantine', 'QuarantineController@index');
Route::get('/rgst/quarantine/add', 'QuarantineController@add');
Route::post('/rgst/quarantine/add', 'QuarantineController@create');
Route::get('/rgst/quarantine/edit', 'QuarantineController@edit');
Route::post('/rgst/quarantine/edit', 'QuarantineController@update');
Route::get('/rgst/quarantine/del', 'QuarantineController@delete');
Route::post('/rgst/quarantine/del', 'QuarantineController@remove');
Route::post('/rgst/quarantine/get_items', 'QuarantineController@get_items');
Route::get('/rgst/quarantine/export_csv', 'QuarantineController@export_csv');
// ランク
Route::get('/rgst/rank', 'RankController@index');
Route::get('/rgst/rank/add', 'RankController@add');
Route::post('/rgst/rank/add', 'RankController@create');
Route::get('/rgst/rank/edit', 'RankController@edit');
Route::post('/rgst/rank/edit', 'RankController@update');
Route::get('/rgst/rank/del', 'RankController@delete');
Route::post('/rgst/rank/del', 'RankController@remove');
Route::post('/rgst/rank/get_items', 'RankController@get_items');
Route::get('/rgst/rank/export_csv', 'RankController@export_csv');
