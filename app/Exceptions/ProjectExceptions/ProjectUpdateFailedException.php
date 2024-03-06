<?php

namespace App\Exceptions\ProjectExceptions;

use App\Exceptions\BusinessLogicException;

class ProjectUpdateFailedException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::UPDATING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Failed to update project";
    }
}
