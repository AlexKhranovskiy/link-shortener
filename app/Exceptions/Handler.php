<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
        $this->renderable(function (BadRequestException $e) {
            return response()->view('link.error', [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => $e->data
            ]);
        });

        $this->renderable(function (Throwable $e) {
            return response()->view('link.error', [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ]);
        });
    }
}
