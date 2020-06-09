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

Auth::routes();

Route::get('/countries', 'Backend\AdminControllers\CountryController@getCountries')->name('countries');
Route::get('/country/{id}/provinces', 'Backend\AdminControllers\ProvinceControler@getProvinces')->name('provinces');
Route::get('/province/{id}/cities', 'Backend\AdminControllers\CityControler@getCities')->name('cities');
Route::get('/city/{id}/towns', 'Backend\AdminControllers\TownControler@getTowns')->name('towns');

