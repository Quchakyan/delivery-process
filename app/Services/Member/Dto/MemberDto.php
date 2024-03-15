<?php

namespace App\Services\Member\Dto;

use App\Http\Requests\Member\MemberRequest;

class MemberDto
{
    protected string $name;
    protected string $lastname;
    protected int $roleId;
    protected int $positionId;
    protected int|null $mentorId;
    protected int $manualBusyness;
    public function __construct(MemberRequest $request)
    {
        $this->name = $request->getName();
        $this->lastname = $request->getLastname();
        $this->roleId = $request->getRoleId();
        $this->positionId = $request->getPositionId();
        $this->mentorId = $request->getMentorId();
        $this->manualBusyness = $request->getManualBusyness();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function getPositionId(): int
    {
        return $this->positionId;
    }

    public function getMentorId(): int|null
    {
        return $this->mentorId;
    }

    public function getManualBusyness(): int|null
    {
        return $this->manualBusyness;
    }
}
