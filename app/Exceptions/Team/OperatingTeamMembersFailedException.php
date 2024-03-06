<?php

namespace App\Exceptions\Team;

use App\Exceptions\BusinessLogicException;
use Exception;

class OperatingTeamMembersFailedException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return BusinessLogicException::OPERATING_TEAM;
    }

    public function getStatusMessage(): string
    {
        return "Team members operating failed";
    }
}
