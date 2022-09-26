<?php

use App\Http\Controllers\QuotaController;
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

Route::group(['middleware' => 'NoUserIsAllowed',
], static function ($router) {

    Route::group(['prefix' => 'quotas'
    ], static function ($router) {
        Route::post('', [QuotaController::class, 'store'])->middleware("NoFuelCenterIsAllowed");
        Route::put('', [QuotaController::class, 'update']);
    });

});

//Route::middleware('microservice_auth')->post('/quotas', static function () {
//    return auth()->user();
//});
