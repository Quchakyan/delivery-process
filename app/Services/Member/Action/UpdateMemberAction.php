<?php

namespace App\Services\Member\Action;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Models\Member;
use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Write\Member\MemberWriteRepository;
use App\Services\Member\Dto\UpdateMemberDto;

class UpdateMemberAction
{
    public function __construct(
        protected MemberWriteRepository $memberWriteRepository,
    ) {}

    /**
     * @throws MemberNotSavedException
     */
    public function run(UpdateMemberDto $dto): Member
    {
        return $this->memberWriteRepository->update($dto);
    }
}
