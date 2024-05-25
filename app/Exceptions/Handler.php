<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        
        if(!config('custom_api.debug')){
            $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'status' => 404,
                        'message' => __('notFoundUrl')
                    ], 404);
                }
            });
            $this->renderable(function (NotFoundHttpException $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'status' => 404,
                        'message' => __('noData')
                    ], 404);
                }
            });
            $this->renderable(function (ModelNotFoundException $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'status' => 404,
                        'message' => __('noData')], 
                        404);
                }
            });
            $this->renderable(function (TooManyRequestsHttpException $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'status' => 429,
                        'message' => __('tooManyRequest')], 429);
                }
            });
        }
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            if($request->routeIs('api.*')){
                return response()->json([
                    'status' => 401,
                    'message' => __('unauthenticate')
                ], 401);
            }
            return redirect()->guest(route('login'));
        }
        
        return response()->json([
            'status' => 401,
            'message' => __('unauthenticate')
        ], 401);
        
    }
}
