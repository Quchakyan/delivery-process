<?php

namespace App\Repositories\Write\MemberWriteRepository;

use App\Models\Member;

interface MemberWriteRepositoryInterface
{
    public function save(Member $member): bool;
}
