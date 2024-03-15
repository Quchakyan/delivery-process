<?php

namespace App\Services\Project\Action;

use App\Exceptions\Project\ProjectDeletingFailedException;
use App\Http\Requests\GetIdForDeletingRequest;
use App\Repositories\Write\Project\ProjectWriteRepository;

class DeleteProjectAction
{
    public function __construct(protected ProjectWriteRepository $projectWriteRepository)
    {}

    /**
     * @throws ProjectDeletingFailedException
     */
    public function run(GetIdForDeletingRequest $request): void
    {
        $this->projectWriteRepository->delete($request->getId());
    }
}
