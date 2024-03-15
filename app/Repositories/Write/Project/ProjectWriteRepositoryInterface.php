<?php

namespace App\Repositories\Write\Project;

use App\Models\Project;
use App\Services\Project\Dto\ProjectDto;
use App\Services\Project\Dto\ProjectUpdateDto;

interface ProjectWriteRepositoryInterface
{
    public function create(ProjectDto $dto): Project;
    public function update(ProjectUpdateDto $dto): Project;
    public function delete(int $id): void;
    public function save(Project $project): bool;
}
