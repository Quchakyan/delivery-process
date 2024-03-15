<?php

namespace App\Http\Controllers;

use App\Exceptions\Team\TeamDeletingFailedException;
use App\Exceptions\Team\TeamSaveFailedException;
use App\Http\Requests\GetIdForDeletingRequest;
use App\Http\Requests\Team\OperateTeamRequest;
use App\Http\Requests\Team\TeamRequest;
use App\Services\Team\Action\CreateTeamAction;
use App\Services\Team\Action\DeleteTeamAction;
use App\Services\Team\Action\IndexTeamAction;
use App\Services\Team\Action\OperateTeamAction;
use App\Services\Team\Dto\OperateTeamDto;
use App\Services\Team\Dto\TeamDto;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function __construct(
        protected CreateTeamAction  $createTeamAction,
        protected OperateTeamAction $operateTeamAction,
        protected IndexTeamAction   $indexTeamAction,
        protected DeleteTeamAction $deleteTeamAction,
    ){}

    public function index(): View
    {
        $data = $this->indexTeamAction->run();

        return view('pages.teams', [...$data]);
    }

    /**
     * @throws TeamSaveFailedException
     */
    public function create(TeamRequest $request): RedirectResponse
    {
        $dto = new TeamDto($request);

        $this->createTeamAction->run($dto);

        return redirect()->route('teams');
    }

    public function operateTeam(OperateTeamRequest $request): RedirectResponse
    {
        $dto = new OperateTeamDto($request);

        $this->operateTeamAction->run($dto);

        return redirect()->route('teams');
    }

    /**
     * @throws TeamDeletingFailedException
     */
    public function delete(GetIdForDeletingRequest $request): RedirectResponse
    {
        $this->deleteTeamAction->run($request);

        return redirect()->route('teams');
    }
}
