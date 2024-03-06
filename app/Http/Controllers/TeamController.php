<?php

namespace App\Http\Controllers;

use App\Exceptions\Team\TeamSaveFailedException;
use App\Http\Requests\Team\OperateTeammatesRequest;
use App\Http\Requests\Team\TeamRequest;
use App\Services\Team\Action\CreateTeamAction;
use App\Services\Team\Action\OperateTeammatesAction;
use App\Services\Team\Dto\OperateTeammatesDto;
use App\Services\Team\Dto\TeamDto;

class TeamController extends Controller
{
    public function __construct(
        protected CreateTeamAction $createTeamAction,
        protected OperateTeammatesAction $operateTeammatesAction
    ) {}

    /**
     * @throws TeamSaveFailedException
     */
    public function create(TeamRequest $request)
    {
        $dto = new TeamDto($request);

        $this->createTeamAction->run($dto);

        return response()->json(['success'=>true]);
    }

    public function operateTeammates(OperateTeammatesRequest $request)
    {
        $dto = new OperateTeammatesDto($request);

        $this->operateTeammatesAction->run($dto);

        return response()->json(["succes"=>true]);
    }
}
