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

Route::get('login','Auth\LoginController@loginPage')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('user/logout','Auth\LoginController@logout')->name('user.logout');
Route::get('user/my/profile','UserController@profile')->name('user.my.profile'); // Yapılacak