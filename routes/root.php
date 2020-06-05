<?php

use Illuminate\Support\Facades\Route;
Route::get('/admin/dashboard', 'HomeController@index')->name('admin.home');

Route::get('/admin/roles', 'RolController@index')->name('roles.index');
Route::post('/admin/roles', 'RolController@store')->name('roles.store');
Route::get('/admin/roles/new', 'RolController@new')->name('roles.new');
Route::get('/admin/roles/{id}/edit', 'RolController@edit')->name('roles.edit');
Route::put('/admin/roles/{id}/update', 'RolController@update')->name('roles.update');
Route::get('/admin/roles/{id}', 'RolController@show')->name('roles.show');
Route::delete('/admin/roles/{id}', 'RolController@destroy')->name('roles.destroy');

Route::get('/admin/permissions/{id}', 'PermissionController@index')->name('permissions.index');
Route::post('/admin/permissions/{id}', 'PermissionController@store')->name('permissions.store');
Route::get('/admin/permissions//{id}/new', 'PermissionController@new')->name('permissions.new');
Route::get('/admin/permissions/{id}/edit', 'PermissionController@edit')->name('permissions.edit');
Route::put('/admin/permissions/{id}/update', 'PermissionController@update')->name('permissions.update');
Route::delete('/admin/permissions/{id}', 'PermissionController@destroy')->name('permissions.destroy');


Route::get('/admin/users', 'UserController@index')->name('users.index');
Route::post('/admin/users', 'UserController@store')->name('users.store');
Route::get('/admin/users/new', 'UserController@new')->name('users.new');
Route::get('/admin/users/{id}/show', 'UserController@show')->name('users.show');
Route::get('/admin/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::put('/admin/users/{id}/update', 'UserController@update')->name('users.update');
Route::delete('/admin/users/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('/admin/users/persons','UserController@getPersons')->name('users.getpersons');


Route::get('/persons', 'PersonController@index')->name('persons.index');
Route::post('/persons', 'PersonController@store')->name('persons.store');
Route::get('/persons/new', 'PersonController@new')->name('persons.new');
Route::get('/persons/{id}/show', 'PersonController@show')->name('persons.show');
Route::get('/persons/{id}/edit', 'PersonController@edit')->name('persons.edit');
Route::put('/persons/{id}/update', 'PersonController@update')->name('persons.update');
Route::delete('/persons/{id}', 'PersonController@destroy')->name('persons.destroy');