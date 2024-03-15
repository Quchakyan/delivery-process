<?php

namespace App\Services\Team\Dto;

use App\Http\Requests\Team\OperateTeamRequest;

class OperateTeamDto extends TeamDto
{
    protected int $teamId;
    protected array|null $teammateIds;

    public function __construct(OperateTeamRequest $request)
    {
        $this->teamId = $request->getTeamId();
        $this->teammateIds = $request->getTeammateIds();
        parent::__construct($request);
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getTeammateIds():array|null
    {
        return $this->teammateIds;
    }
}
