<?php

namespace App\Repositories\Write\Member;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Models\Member;

class MemberWriteRepository implements MemberWriteRepositoryInterface
{

    /**
     * @throws MemberNotSavedException
     */
    public function save(Member $member): bool
    {
        if (!$member->save())
        {
            throw new MemberNotSavedException();
        }

        return true;
    }
}
