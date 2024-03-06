<?php

namespace App\Services\Team\Dto;

use App\Http\Requests\Team\OperateTeammatesRequest;

class OperateTeammatesDto
{
     public int $teamId;
     public array $teammateIds;

     public function __construct(OperateTeammatesRequest $request)
     {
         $this->teamId = $request->getTeamId();
         $this->teammateIds = $request->getTeammateIds();
     }
}
