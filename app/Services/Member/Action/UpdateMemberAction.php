<?php

namespace App\Services\Member\Action;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Write\Member\MemberWriteRepository;
use App\Services\Member\Dto\UpdateMemberDto;

class UpdateMemberAction
{
    public function __construct(
        protected MemberWriteRepository $memberWriteRepository,
        protected MemberReadRepository $memberReadRepository
    ) {}

    /**
     * @throws MemberNotSavedException
     */
    public function run(UpdateMemberDto $dto): bool
    {
        $member = $this->memberReadRepository->getById($dto->id);

        $member->updateSelf($dto);

        return $this->memberWriteRepository->save($member);
    }
}
