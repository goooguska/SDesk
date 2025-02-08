<?php

use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function() {
    Route::get('/user/{id}', [UserController::class, 'getUser']);
    Route::get('/requests/{userId}', [RequestController::class, 'getAllRequests']);
    Route::get('/requests/{requestId}', [RequestController::class, 'showRequest']);


});
