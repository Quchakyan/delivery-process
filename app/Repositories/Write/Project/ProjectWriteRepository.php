<?php

namespace App\Repositories\Write\Project;

use App\Exceptions\Project\ProjectDeletingFailedException;
use App\Exceptions\ProjectExceptions\ProjectNotSavedException;
use App\Models\Project;
use App\Repositories\Read\Project\ProjectReadRepository;
use App\Services\Project\Dto\ProjectDto;
use App\Services\Project\Dto\ProjectUpdateDto;
use Illuminate\Database\Eloquent\Builder;

class ProjectWriteRepository implements ProjectWriteRepositoryInterface
{
    public function __construct(protected ProjectReadRepository $projectReadRepository)
    {}

    private function query(): Builder
    {
        return Project::query();
    }

    private function newProject(): Project
    {
        return new Project();
    }

    /**
     * @throws ProjectNotSavedException
     */
    public function create(ProjectDto $dto): Project
    {
        $project = $this->newProject();

        return $this->operateProject($project, $dto);
    }

    /**
     * @throws ProjectNotSavedException
     */
    public function update(ProjectUpdateDto $dto): Project
    {
        $project = $this->projectReadRepository->getById($dto->getId());

        return $this->operateProject($project, $dto);
    }

    /**
     * @throws ProjectNotSavedException
     */
    private function operateProject(Project $project, ProjectDto $dto): Project
    {
        $project->setName($dto->getName())
            ->setOwnerId($dto->getOwnerId())
            ->setRate($dto->getRate())
            ->setCurrencyId($dto->getCurrencyId())
            ->setBid($dto->getBid());

        $this->save($project);

        return $project;
    }

    /**
     * @throws ProjectDeletingFailedException
     */
    public function delete(int $id): void
    {
        $query = $this->query()->where('id',$id);

        $query->exists() && !$query->delete() && throw new ProjectDeletingFailedException();
    }

    /**
     * @throws ProjectNotSavedException
     */
    public function save(Project $project): bool
    {
        if(!$project->save())
        {
            throw new ProjectNotSavedException();
        }

        return true;
    }
}
