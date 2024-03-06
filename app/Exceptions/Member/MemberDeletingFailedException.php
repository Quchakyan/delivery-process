<?php

namespace App\Exceptions\Member;

use App\Exceptions\BusinessLogicException;
use Exception;

class MemberDeletingFailedException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return BusinessLogicException::DELETING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Failed to delete member";
    }
}
