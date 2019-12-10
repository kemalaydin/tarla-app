<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('kemal/{id}','ApiController@ProductDetail');
Route::post('login', 'ApiController@login');
Route::group(['middleware' => ['auth:api','isAdmin']], function () {
    Route::post('product_search', 'ApiController@ProductDetail');
});
