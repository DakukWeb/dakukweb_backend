<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    /**
     * The list of exception types that are not reported
     *
     * @var array<int, string>
     */
    /*protected $dontReport = [
        //JsonException::class,
    ];*/
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
    public function register()
    {
        // Registering a global exception handler
        $this->renderable(function (Throwable $e, $request) {
            // Checking if the request is for an API route
            if ($request->is('api/*')) {
                // Handling API exceptions
                return $this->handleApiException($request, $e);
            }
        });
    }
    private function handleApiException($request, Exception $exception)
    {
        // Prepare the exception
        $exception = $this->prepareException($exception);
        // Handle the API response for the exception
        return $this->handleApiResponse($exception);
    }
    private function handleApiResponse($exception)
    {
        // Determine the status code of the exception
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }
        $response = [];
        // Generate response based on the status code
        switch ($statusCode) {
            case 401:
                $response['message'] = 'Unauthorized';
                break;
            case 403:
                $response['message'] = 'Forbidden';
                break;
            case 404:
                $response['message'] = 'Not Found';
                break;
            case 405:
                $response['message'] = 'Method Not Allowed';
                break;
            case 422:
                $response['message'] = $exception->original['message'];
                $response['errors'] = $exception->original['errors'];
                break;
            default:
                // Handle other status codes
                $response['message'] = ($statusCode == 500) ? 'Whoops, looks like something went wrong' : $exception->getMessage();
                break;
        }
        // Include additional details in the response if debugging is enabled
        if (config('app.debug')) {
            //descomment if you want the trace
            //$response['trace'] = $exception->getTrace();
        }
        $response['details'] = [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine()
        ];
        $response['status'] = $statusCode;
        // Return JSON response with the error details and status code
        return response()->json($response, $statusCode);
    }
}
