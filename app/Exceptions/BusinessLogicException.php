<?php

namespace App\Exceptions;

use Exception;

abstract class BusinessLogicException extends Exception
{
    const SAVING_ERROR = 601;
    const DELETING_ERROR = 602;
    const OPERATING_TEAM = 603;
    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;
}
