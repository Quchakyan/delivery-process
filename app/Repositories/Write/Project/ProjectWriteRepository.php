<?php

namespace App\Repositories\Write\Project;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Exceptions\ProjectExceptions\ProjectNotSavedException;
use App\Models\Project;
class ProjectWriteRepository implements ProjectWriteRepositoryInterface
{

    public function save(Project $project): bool
    {
        if(!$project->save())
        {
            throw new ProjectNotSavedException();
        }

        return true;
    }
}
