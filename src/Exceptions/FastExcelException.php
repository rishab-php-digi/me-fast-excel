<?php
namespace Me\FastExcel\Exceptions;

use Exception;

class FastExcelException extends Exception
{
    public static function invalidFile($path)
    {
        return new self("The file at {$path} is invalid or not readable.");
    }
}
