<?php

namespace App\Exceptions\Team;

use App\Exceptions\BusinessLogicException;
use Exception;

class TeamSaveFailedException extends BusinessLogicException
{
    //
    public function getStatus(): int
    {
        return BusinessLogicException::SAVING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return 'Failed to create new team';
    }
}
