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

Route::get('/','HomeController@index')->name('index');
Route::resource('user', 'UserController')->middleware('isAdmin');
Route::resource('plant','PlantController')->middleware('auth');
Route::resource('supplier','SupplierController')->middleware('auth');
Route::resource('product-type','ProductTypeController')->middleware('auth');
Route::resource('seed','SeedController')->middleware('auth');


Route::get('login','Auth\LoginController@loginPage')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('user.logout');
Route::get('profile','UserController@profile')->name('user.my.profile'); // Yapılacak

