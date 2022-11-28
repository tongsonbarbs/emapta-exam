<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/interests', [Controllers\InterestController::class, 'index']);
    Route::get('/interests/{id}', [Controllers\InterestController::class, 'get']);
    Route::post('/interests', [Controllers\InterestController::class, 'store']);
    Route::delete('/interests/{id}', [Controllers\InterestController::class, 'delete']);

    Route::get('/clients', [Controllers\ClientController::class, 'index']);
    Route::get('/clients/{id}', [Controllers\ClientController::class, 'get']);
    Route::post('/clients', [Controllers\ClientController::class, 'store']);
    Route::put('/clients/{id}', [Controllers\ClientController::class, 'update']);
    Route::delete('/clients/{id}', [Controllers\ClientController::class, 'delete']);
});