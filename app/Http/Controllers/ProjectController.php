<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Services\Project\Action\CreateProjectAction;
use App\Services\Project\Action\UpdateProjectAction;
use App\Services\Project\Dto\ProjectDto;
use App\Services\Project\Dto\ProjectUpdateDto;

class ProjectController extends Controller
{
    public function __construct(
        protected CreateProjectAction $createProjectAction,
        protected UpdateProjectAction $updateProjectAction
    )
    {}
    public function index()
    {
        //
    }
    public function create(ProjectRequest $request)
    {

        $dto = new ProjectDto($request);

        $this->createProjectAction->run($dto);

        return response()->json(["success"=>true]);
    }

    public function update(UpdateProjectRequest $request)
    {
        $dto = new ProjectUpdateDto($request);

        $this->updateProjectAction->run($dto);

        return response()->json(["updated"=>true]);
    }
}
