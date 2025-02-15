<?php

use App\Http\Controllers\Pages\PageController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia('Home');
})->middleware(['auth', 'verified'])->name('home');

Route::prefix('requests')->name('requests.')
    ->middleware(['auth', 'verified'])
    ->group(function (Router $router) {
       $router->get('/create-request', [PageController::class, 'create'] )->name('createRequest');
       $router->get('/manage-requests', [PageController::class, 'manage'])->name('manageRequest');
       $router->get('/manage-requests/{requestId}', [PageController::class, 'show'])->name('showRequest');

    });

Route::fallback(function () {
    return Inertia::render('Errors/NotFound', [
        'status' => 404,
        'title' => 'Страница не найдена'
    ]);
});

require __DIR__ . '/auth.php';
