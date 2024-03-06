<?php

namespace App\Repositories\Write\Member;

use App\Models\Member;

interface MemberWriteRepositoryInterface
{
    public function save(Member $member): bool;
}
