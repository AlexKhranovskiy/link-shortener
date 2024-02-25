<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends \Exception
{
    public array $data;
    public function __construct(
        string     $message = "Bad Request",
        int        $code = 400,
        ?Exception $previous = null,
        array      $data = [],
    )
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }
}
