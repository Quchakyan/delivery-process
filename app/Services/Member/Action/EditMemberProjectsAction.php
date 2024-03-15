<?php

namespace App\Services\Member\Action;

use App\Repositories\Write\Member\MemberWriteRepository;
use App\Services\Member\Dto\MemberProjectsDto;

class EditMemberProjectsAction
{
    public function __construct(protected MemberWriteRepository $memberWriteRepository)
    {}

    public function run(MemberProjectsDto $dto): bool
    {
        return $this->memberWriteRepository->editMemberProjects($dto);
    }
}
