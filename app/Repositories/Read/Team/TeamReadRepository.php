<?php

namespace App\Repositories\Read\Team;

use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;

class TeamReadRepository implements TeamReadRepositoryInterface
{
    public function query(): Builder
    {
        return Team::query();
    }
    public function getById(int $id): Team
    {
        return $this->query()->find($id)->first();
    }
}
