<?php

namespace App\Exceptions\MemberExceptions;

use App\Exceptions\BusinessLogicException;

class MemberNotSavedException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::SAVING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Failed to create new member";
    }
}
