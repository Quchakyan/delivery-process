<?php

namespace App\Repositories\Read\Member;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MemberReadRepository implements MemberReadRepositoryInterface
{
    public function query(): Builder
    {
        return Member::query();
    }
    public function index(): Collection | array
    {
        return $this->query()->with('position')->get(['name','lastname','position_id']);
    }

    public function getById(int $id): Member
    {
        return $this->query()->find($id)->first();
    }

    public function getWithStudents(): Collection
    {
        return $this->query()->withWhereHas('students')->get();
    }
}
