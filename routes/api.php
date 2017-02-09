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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::resource('widgets', 'WidgetsController');
});
*/

Route::get('/widgets', 'Api\WidgetsController@index'); //->middleware('auth:api'); not figured out yet
Route::get('/widgets/{id}', 'Api\WidgetsController@show');
Route::post('/widgets', 'Api\WidgetsController@store');
Route::delete('/widgets/{id}', 'Api\WidgetsController@destroy');
Route::patch('/widgets/{id}', 'Api\WidgetsController@update');