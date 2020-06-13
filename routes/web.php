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

//  Route::get('/', function () {
//      return view('welcome');
//  });
Route::get('/', 'FrontEnd\PublicsControllers\HomeController@index');
Route::get('/countries', 'Backend\AdminControllers\CountryController@getCountries')->name('countries');
Route::get('/country/{id}/provinces', 'Backend\AdminControllers\ProvinceControler@getProvinces')->name('provinces');
Route::get('/province/{id}/cities', 'Backend\AdminControllers\CityControler@getCities')->name('cities');
Route::get('/city/{id}/towns', 'Backend\AdminControllers\TownControler@getTowns')->name('towns');



Route::get('/country/{id}', 'Backend\AdminControllers\CountryController@getCountry')->name('country');
Route::get('/province/{id}', 'Backend\AdminControllers\ProvinceControler@getProvince')->name('province');
Route::get('/city/{id}', 'Backend\AdminControllers\CityControler@getCity')->name('city');
Route::get('/town/{id}', 'Backend\AdminControllers\TownControler@getTown')->name('town');
Auth::routes();

