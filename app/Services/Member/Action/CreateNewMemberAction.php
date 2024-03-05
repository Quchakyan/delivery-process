<?php

namespace App\Services\Member\Action;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Models\Member;
use App\Repositories\Write\MemberWriteRepository\MemberWriteRepository;
use App\Services\Member\Dto\CreateNewMemberDto;

class CreateNewMemberAction
{
    public function __construct(protected MemberWriteRepository $memberWriteRepository)
    {}

    /**
     * @throws MemberNotSavedException
     */
    public function run(CreateNewMemberDto $dto): bool
    {
        $member = Member::staticCreate($dto);

        return $this->memberWriteRepository->save($member);
    }
}
