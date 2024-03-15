<?php

namespace App\Repositories\Read\Team;

use App\ConstsLibrary\LibraryConsts;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
class TeamReadRepository implements TeamReadRepositoryInterface
{
    use LibraryConsts;
    public function query(): Builder
    {
        return Team::query();
    }

    public function index(): Collection | null
    {
        return $this->query()->with(self::TEAM_TEAMMATES)->get();
    }

    public function getById(int $id): Team
    {
        return $this->query()->where('id',$id)->get()->first();
    }
}
