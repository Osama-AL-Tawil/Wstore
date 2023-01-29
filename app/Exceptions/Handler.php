<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{


    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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

        });
        $this->renderable(function (Throwable $e){
            if ($e instanceof ValidationException){
                return redirect()->back()->with('error-message',$e->getMessage());
            }
            if ($e instanceof AuthenticationException){
                return redirect()->route('unauthenticated');
            }
            if ($e instanceof Exception){
                //dd($e);
                return redirect()->route('error')->with('message',$e->getMessage());
            }
        });
    }


}
