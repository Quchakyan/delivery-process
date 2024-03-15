<?php

namespace App\Services\Project\Action;

use App\Exceptions\ProjectExceptions\ProjectNotSavedException;
use App\Models\Project;
use App\Repositories\Write\Project\ProjectWriteRepository;
use App\Services\Project\Dto\ProjectUpdateDto;

class UpdateProjectAction
{
    public function __construct(protected ProjectWriteRepository $projectWriteRepository)
    { }

    /**
     * @throws ProjectNotSavedException
     */
    public function run(ProjectUpdateDto $dto): Project
    {
        return $this->projectWriteRepository->update($dto);
    }
}
