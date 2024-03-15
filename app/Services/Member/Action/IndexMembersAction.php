<?php

namespace App\Services\Member\Action;

use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Read\Position\PositionsReadRepository;
use App\Repositories\Read\Role\RolesReadRepository;
use Illuminate\Support\Collection;

class IndexMembersAction
{
    public function __construct(
        protected MemberReadRepository $memberReadRepository,
        protected RolesReadRepository $rolesReadRepository,
        protected PositionsReadRepository $positionsReadRepository
    ){}

    public function run(): Collection
    {
        $data = collect();

        $data['members'] = $this->memberReadRepository->index();
        $data['mentors'] = $this->memberReadRepository->getUsersWhichWasNotPractician();
        $data['roles'] = $this->rolesReadRepository->index();
        $data['positions'] = $this->positionsReadRepository->index();

        return $data;
    }
}
