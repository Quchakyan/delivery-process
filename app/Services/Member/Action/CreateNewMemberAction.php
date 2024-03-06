<?php

namespace App\Services\Member\Action;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Models\Member;
use App\Repositories\Write\Member\MemberWriteRepository;
use App\Services\Member\Dto\CreateNewMemberDto;
use App\Services\Member\Dto\MemberDto;

class CreateNewMemberAction
{
    public function __construct(protected MemberWriteRepository $memberWriteRepository)
    {}

    /**
     * @throws MemberNotSavedException
     */
    public function run(MemberDto $dto): bool
    {
        $member = Member::staticCreate($dto);

        return $this->memberWriteRepository->save($member);
    }
}
