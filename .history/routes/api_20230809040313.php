<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('api.v1.')->namespace('Api\V1')->group(function () {
    Route::get('/status', function () {
        return response()->json(['status' => 'OK']);
    });
    Route::get('api/v1/status', function () {
        return response()->json(['status' => 'OK']);
    });
    //middleware('auth:api')->
    //Route::apiResource('contacts','ContactController');
    //Route::apiResource('flights','App\Http\Controllers\Api\V1\FlightController');
    
    
});
