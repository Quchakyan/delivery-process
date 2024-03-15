<?php

namespace App\Services\Team\Action;

use App\Exceptions\Team\TeamDeletingFailedException;
use App\Http\Requests\GetIdForDeletingRequest;
use App\Repositories\Write\Team\TeamWriteRepository;

class DeleteTeamAction
{
    public function __construct(protected TeamWriteRepository $teamWriteRepository)
    {}

    /**
     * @throws TeamDeletingFailedException
     */
    public function run(GetIdForDeletingRequest $request): void
    {
        $this->teamWriteRepository->delete($request->getId());
    }
}
