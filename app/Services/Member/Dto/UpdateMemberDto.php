<?php

namespace App\Services\Member\Dto;

use App\Http\Requests\Member\UpdateMemberRequest;

/**
 * @property int $id;
 */
class UpdateMemberDto extends MemberDto
{
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
