<?php

namespace App\Services\Project\Action;

use App\Exceptions\ProjectExceptions\ProjectNotSavedException;
use App\Models\Project;
use App\Repositories\Write\Project\ProjectWriteRepository;
use App\Services\Project\Dto\ProjectDto;

class CreateProjectAction
{
    public function __construct(protected ProjectWriteRepository $projectWriteRepository)
    {}

    /**
     * @throws ProjectNotSavedException
     */
    public function run(ProjectDto $dto): bool
    {
        $project = Project::staticCreate($dto);

        return $this->projectWriteRepository->save($project);
    }
}
