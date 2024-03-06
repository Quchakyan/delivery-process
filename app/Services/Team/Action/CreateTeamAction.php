<?php

namespace App\Services\Team\Action;

use App\Exceptions\Team\TeamSaveFailedException;
use App\Models\Team;
use App\Repositories\Write\Team\TeamWriteRepository;
use App\Services\Team\Dto\TeamDto;

class CreateTeamAction
{
    public function __construct(protected TeamWriteRepository $teamWriteRepository)
    {}

    /**
     * @throws TeamSaveFailedException
     */
    public function run(TeamDto $dto): Team
    {
        return $this->teamWriteRepository->create($dto);
    }
}
