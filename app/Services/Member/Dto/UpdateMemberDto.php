<?php

namespace App\Services\Member\Dto;

class UpdateMemberDto extends MemberDto
{
    public int $id;

    public function __construct()
    {
        parent::__construct();
    }
}
