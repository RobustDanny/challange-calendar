<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\MonthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->prefix('api')->group(function () {

    Route::resource('months', MonthController::class);

    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class);
    Route::post('/register', RegisterController::class);

});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');