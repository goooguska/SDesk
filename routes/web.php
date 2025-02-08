<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Pages\RequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return inertia('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return inertia('Home');
})->middleware(['auth', 'verified'])->name('home');

Route::prefix('requests')->name('requests.')
    ->middleware(['auth', 'verified'])
    ->group(function (Router $router) {
       $router->get('/create-request', [RequestController::class, 'create'] )->name('createRequest');
       $router->get('/manage-requests', [RequestController::class, 'manage'])->name('manageRequest');
       $router->get('/show-request/{requestId}', [RequestController::class, 'show'])->name('showRequest');

    });




Route::middleware('auth')->group(function () {});

require __DIR__ . '/auth.php';
