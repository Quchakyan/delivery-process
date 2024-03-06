<?php

namespace App\Exceptions\Team;

use App\Exceptions\BusinessLogicException;
use Exception;

class TeamDeletingFailedException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return BusinessLogicException::DELETING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Failed to delete team";
    }
}
