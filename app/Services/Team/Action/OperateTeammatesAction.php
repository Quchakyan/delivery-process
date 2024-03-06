<?php

namespace App\Services\Team\Action;


use App\Exceptions\Team\OperatingTeamMembersFailedException;
use App\Repositories\Write\Team\TeamWriteRepository;
use App\Services\Team\Dto\OperateTeammatesDto;

class OperateTeammatesAction
{
    public function __construct(protected TeamWriteRepository $teamWriteRepository)
    {}

    /**
     * @throws OperatingTeamMembersFailedException
     */
    public function run(OperateTeammatesDto $dto): bool
    {
        return $this->teamWriteRepository->operateTeammates($dto->teamId, $dto->teammateIds);
    }
}
