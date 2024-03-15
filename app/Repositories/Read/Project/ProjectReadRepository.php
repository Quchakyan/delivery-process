<?php

namespace App\Repositories\Read\Project;

use App\ConstsLibrary\LibraryConsts;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProjectReadRepository implements ProjectReadRepositoryInterface
{
    use LibraryConsts;
    private array $indexRelations = [
        self::PROJECT_OWNER,
        self::PROJECT_CURRENCY
    ];
    public function query(): Builder
    {
        return Project::query();
    }

    public function index(): Collection
    {
        return $this->query()->with($this->indexRelations)->get();
    }

    public function getById(int $id): Project
    {
        return $this->query()->where('id',$id)->get()->first();
    }
}
