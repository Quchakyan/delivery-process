<?php

namespace App\Repositories\Write\Project;

use App\Models\Project;

interface ProjectWriteRepositoryInterface
{
    public function save(Project $project): bool;
}
