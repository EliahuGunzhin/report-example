<?php

namespace App\Report\Exceptions;

use Exception;
use Throwable;

class FileNotFoundException extends Exception
{
    public function __construct($fileName = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("File {$fileName} not found", $code, $previous);
    }
}