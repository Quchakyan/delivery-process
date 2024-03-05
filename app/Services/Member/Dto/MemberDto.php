<?php

namespace App\Services\Member\Dto;

use App\Http\Requests\Member\MemberRequest;

class MemberDto
{
    public string $name;
    public string $lastname;
    public int $roleId;
    public int $positionId;
    public int|null $mentorId;
    public int $manualBusyness;

    public function __construct(MemberRequest $request)
    {
        $this->name = $request->getName();
        $this->lastname = $request->getLastname();
        $this->roleId = $request->getRoleId();
        $this->positionId = $request->getPositionId();
        $this->mentorId = $request->getMentorId();
        $this->manualBusyness = $request->getManualBusyness();
    }
}
