<?php

namespace App\Services\Member\Action;

use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Read\Project\ProjectReadRepository;
use Illuminate\Support\Collection;
class IndexMemberWithProjectsAction
{
    public function __construct(
        protected MemberReadRepository $memberReadRepository,
        protected ProjectReadRepository $projectReadRepository
    ){}

    public function run(): Collection
    {
        $data = collect();

        $data['membersData'] = $this->memberReadRepository->getWithProjects();
        $data['projects'] = $this->projectReadRepository->index();

        return $data;
    }
}
