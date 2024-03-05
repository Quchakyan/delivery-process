<?php

namespace App\Exceptions;

use Exception;

abstract class BusinessLogicException extends Exception
{
    const SAVING_ERROR = 601;
    const UPDATING_ERROR = 602;
    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;
}
