<?php

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

//Route::group(['middleware' => 'microservice_auth',
//], static function ($router) {
//
//    Route::group(['prefix' => 'quotas'
//    ], static function ($router) {
//        Route::get('', static function ($router) {
//            return auth()->user();
//        });
//    });
//
//});

Route::middleware('microservice_auth')->post('/quotas', static function () {
    return auth()->user();
});
