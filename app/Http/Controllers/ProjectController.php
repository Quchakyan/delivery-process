<?php

namespace App\Http\Controllers;

use App\Exceptions\Project\ProjectDeletingFailedException;
use App\Exceptions\ProjectExceptions\ProjectNotSavedException;
use App\Http\Requests\GetIdForDeletingRequest;
use App\Http\Requests\Project\ProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Repositories\Read\Project\ProjectReadRepository;
use App\Services\Project\Action\CreateProjectAction;
use App\Services\Project\Action\DeleteProjectAction;
use App\Services\Project\Action\IndexProjectsAction;
use App\Services\Project\Action\UpdateProjectAction;
use App\Services\Project\Dto\ProjectDto;
use App\Services\Project\Dto\ProjectUpdateDto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    public function __construct(
        protected CreateProjectAction $createProjectAction,
        protected UpdateProjectAction $updateProjectAction,
        protected ProjectReadRepository $projectReadRepository,
        protected IndexProjectsAction $indexProjectsAction,
        protected DeleteProjectAction $deleteProjectAction
    ) {}

    public function index(): View
    {
        $data = $this->indexProjectsAction->run();

        return view('pages.projects', [...$data]);
    }

    /**
     * @throws ProjectNotSavedException
     */
    public function create(ProjectRequest $request): RedirectResponse
    {

        $dto = new ProjectDto($request);

        $this->createProjectAction->run($dto);

        return redirect()->route('projects');
    }

    /**
     * @throws ProjectNotSavedException
     */
    public function update(UpdateProjectRequest $request): RedirectResponse
    {
        $dto = new ProjectUpdateDto($request);

        $this->updateProjectAction->run($dto);

        return redirect()->route('projects');
    }

    /**
     * @throws ProjectDeletingFailedException
     */
    public function delete(GetIdForDeletingRequest $request): RedirectResponse
    {
        $this->deleteProjectAction->run($request);

        return redirect()->route('projects');
    }
}
