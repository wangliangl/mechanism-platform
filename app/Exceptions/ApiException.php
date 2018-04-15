<?php
/**
 * User: wangliangliang
 * Date: 2018/4/15
 * Time: 下午5:52
 */

namespace App\Exceptions;

use Exception;
use Throwable;

class ApiException extends Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}