<?php

namespace App\Exceptions\MemberExceptions;

use App\Exceptions\BusinessLogicException;

class MemberUpdateFailedException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return BusinessLogicException::UPDATING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Failed to update member's params";
    }
}
