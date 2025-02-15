<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Inertia\Inertia;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return Inertia::render('Errors/NotFound', [
                'status' => 404,
                'title' => 'Страница не найдена'
            ])->toResponse($request)->setStatusCode(404);
        });
    }

    /**
     * Prepare exception for rendering.
     */
    public function render($request, Throwable $e)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors' => method_exists($e, 'errors') ? $e->errors() : null,
            ], $this->isHttpException($e) ? $e->getStatusCode() : 500);
        }

        return parent::render($request, $e);
    }
}
