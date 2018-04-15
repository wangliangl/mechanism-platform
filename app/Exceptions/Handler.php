<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        ApiException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        $method = $request->getMethod();
        $uri = $request->getRequestUri();
        $host = $request->getHttpHost();
        $params = $request->all();

        return $this->handle($request, $e, $method, $host, $uri, $params);
    }

    public function handle($request, Exception $e, string $method, string $host, string $uri, array $params)
    {
        $log = [
            'method' => $method,
            'host'   => $host,
            'uri'    => $uri,
            'params' => $params
        ];

        if ($e instanceof ApiException) {

            $result = [
                "msg"  => $e->getMessage(),
                "code" => $e->getCode(),
                "data" => (object)[]
            ];

            $log = array_merge($log, ['result' => $result]);
            Log::warning('exception', $log, 'exception_log');
            return response()->json($result);
        }

        return parent::render($request, $e);
    }

}
