<?php

namespace App\Services\Project\Action;

use App\Repositories\Read\Project\ProjectReadRepository;
use App\Repositories\Write\Project\ProjectWriteRepository;
use App\Services\Project\Dto\ProjectUpdateDto;

class UpdateProjectAction
{
    public function __construct(
        protected ProjectWriteRepository $projectWriteRepository,
        protected ProjectReadRepository $projectReadRepository
    )
    { }

    public function run(ProjectUpdateDto $dto)
    {
        $project = $this->projectReadRepository->getById($dto->id);

        $project->updateSelf($dto);

        return $this->projectWriteRepository->save($project);
    }
}
