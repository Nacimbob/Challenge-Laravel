<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Graph\Http\Exceptions\ModelExistsException;
use Modules\Graph\Http\Traits\ApiResponse;
class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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

        $this->renderable(function(Exception $e, $request) {
            return $this->handleException($request, $e);
        });
    }


    public function handleException($request, Exception $exception)
    {

        if($request->wantsJson()){

            if ($exception instanceof ModelNotFoundException) {
                return  $this->failure($exception->getMessage(),404) ;
            }
            if ($exception instanceof ModelExistsException) {
                return  $this->failure($exception->getMessage(),422) ;
            }
        }



    }



}
