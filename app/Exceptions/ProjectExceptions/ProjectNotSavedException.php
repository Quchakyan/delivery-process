<?php

namespace App\Exceptions\ProjectExceptions;

use App\Exceptions\BusinessLogicException;

class ProjectNotSavedException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::SAVING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Failed to create new project";
    }
}
