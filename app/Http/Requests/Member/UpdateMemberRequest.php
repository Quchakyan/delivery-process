<?php

namespace App\Http\Requests\Member;

class UpdateMemberRequest extends MemberRequest
{
    const ID = 'id';

    public function getId(): int
    {
        return $this->get(self::ID);
    }
}
