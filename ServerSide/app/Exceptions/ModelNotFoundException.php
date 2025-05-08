<?php

namespace App\Exceptions;

use Exception;

class ModelNotFoundException extends Exception
{

    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        $this->message = $message;
    }
}
