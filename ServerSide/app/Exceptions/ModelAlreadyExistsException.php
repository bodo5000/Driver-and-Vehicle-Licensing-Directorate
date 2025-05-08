<?php

namespace App\Exceptions;

use Exception;

class ModelAlreadyExistsException extends Exception
{
    public string $modelName;

    public function __construct(string $modelName, string $message = "", int $code = 0, \Throwable $previous = null)
    {
        $this->modelName = $modelName;
        $message = "{$this->modelName} already exists";
        $this->message = $message;
    }

}
