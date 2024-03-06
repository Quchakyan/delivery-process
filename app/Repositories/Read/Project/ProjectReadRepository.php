<?php

namespace App\Repositories\Read\Project;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProjectReadRepository implements ProjectReadRepositoryInterface
{
    private array $relations = ['owner','currency'];
    public function query(): Builder
    {
        return Project::query();
    }
    public function index(): Collection
    {
        return $this->query()->with($this->relations)->get();
    }

    public function getById(int $id): Project
    {
        return $this->query()->find($id)->first();
    }
}
