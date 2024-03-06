<?php

namespace App\Exceptions\Project;

use App\Exceptions\BusinessLogicException;
use Exception;

class ProjectDeletingFailedException extends BusinessLogicException
{

    public function getStatus(): int
    {
        return BusinessLogicException::DELETING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return "Failed to delete the project";
    }
}
