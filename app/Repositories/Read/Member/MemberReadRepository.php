<?php

namespace App\Repositories\Read\MemberReadRepository;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
class MemberReadRepository implements MemberReadRepositoryInterface
{
    public function query(): Builder
    {
        return Member::query();
    }
    public function index(): Collection|array
    {
        return $this->query()->get();
    }

    public function getById(int $id): Member
    {
        return $this->query()->find($id)->first();
    }

    public function haveStudents(int $id): bool
    {
        return !!$this->query()->where('mentor_id', $id)->first();
    }
}
