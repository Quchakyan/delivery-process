<?php

namespace App\Services\Member\Action;

use App\Repositories\Write\MemberWriteRepository\MemberWriteRepository;
use App\Services\Member\Dto\UpdateMemberDto;

class UpdateMemberAction
{
    public function __construct(
        protected MemberWriteRepository $memberWriteRepository)
    {}

    public function run(UpdateMemberDto $dto)
    {

    }
}
