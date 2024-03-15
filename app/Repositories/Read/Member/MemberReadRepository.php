<?php

namespace App\Repositories\Read\Member;

use App\ConstsLibrary\LibraryConsts;
use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MemberReadRepository implements MemberReadRepositoryInterface
{
    use LibraryConsts;
    private array $projectRelations = [
        self::MEMBER_OWN_PROJECTS,
        self::MEMBER_PROJECTS,
        self::MEMBER_PROJECT_STATS,
    ];
    public function query(): Builder
    {
        return Member::query();
    }

    public function index(): Collection | array
    {
        return $this->query()->with(self::MEMBER_POSITION)->get();
    }

    public function getById(int $id): Member
    {
        return $this->query()->where('id',$id)->get()->first();
    }

    public function getWithStudents(): Collection
    {
        return $this->query()->withWhereHas(self::MEMBER_STUDENTS)->get();
    }

    public function getWithProjects(): Collection
    {
        return $this->query()
            ->with($this->projectRelations)
            ->get();
    }

    public function getUsersWhichWasNotPractician(): Collection
    {
        return $this->query()->whereNot('role_id','=', self::ROLE_PRACTICIAN_ID)->get();
    }
}
