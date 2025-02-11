<?php

use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function() {
    Route::get('/user/{id}', [UserController::class, 'getUser']);
    Route::get('/users', [UserController::class, 'getAllUsers']);

    Route::get('/requests/{userId}', [RequestController::class, 'getAllRequests']);
    Route::get('/requests/{requestId}', [RequestController::class, 'showRequest']);
    Route::post('/requests', [RequestController::class, 'createRequest']);
    Route::put('/requests/{requestId}', [RequestController::class, 'updateRequest']);
    Route::delete('/requests/{requestId}', [RequestController::class, 'deleteRequest']);

    Route::get('/statuses', [StatusController::class, 'getAllStatuses']);

});
