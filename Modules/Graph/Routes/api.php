<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/graph', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix' => 'v1'], function () {

    Route::put('graphs/{id}','GraphController@update');
    Route::resource('graphs', 'GraphController')->except('update');
    Route::post('graphs/{id}/nodes','NodeController@store');
    Route::post('graphs/{id}/relations','RelationController@store');
    Route::delete('nodes/{id}','NodeController@destroy');


});
