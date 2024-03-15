<?php

namespace App\Services\Team\Action;

use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Read\Team\TeamReadRepository;
use Illuminate\Support\Collection;

class IndexTeamAction
{
    public function __construct(
        protected TeamReadRepository $teamReadRepository,
        protected MemberReadRepository $memberReadRepository
    ){}

    public function run(): Collection
    {
        $data = collect();

        $data['teamleads'] = $this->memberReadRepository->getUsersWhichWasNotPractician();
        $data['members'] = $this->memberReadRepository->index();
        $data['teams'] = $this->teamReadRepository->index();

        return $data;
    }
}
