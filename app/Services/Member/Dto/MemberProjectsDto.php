<?php

namespace App\Services\Member\Dto;

use App\Http\Requests\Member\EditMemberProjectsRequest;

class MemberProjectsDto
{
    protected int $userId;
    protected array $params;
    public function __construct(EditMemberProjectsRequest $request)
    {
        $this->userId = $request->getUserId();
        $this->params = $request->getParams();
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}
