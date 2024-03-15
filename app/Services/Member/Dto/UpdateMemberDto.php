<?php

namespace App\Services\Member\Dto;

use App\Http\Requests\Member\UpdateMemberRequest;

class UpdateMemberDto extends MemberDto
{
    protected int $id;
    public function __construct(UpdateMemberRequest $request)
    {
        parent::__construct($request);
        $this->id = $request->getId();
    }

    public function getId():int
    {
        return $this->id;
    }
}
