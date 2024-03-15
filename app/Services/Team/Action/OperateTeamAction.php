<?php

namespace App\Services\Team\Action;


use App\Repositories\Write\Team\TeamWriteRepository;
use App\Services\Team\Dto\OperateTeamDto;

class OperateTeamAction
{
    public function __construct(protected TeamWriteRepository $teamWriteRepository)
    {}

    public function run(OperateTeamDto $dto): bool
    {
        return $this->teamWriteRepository->operateTeam(
            $dto->getOwnerId(),
            $dto->getTeamId(),
            $dto->getName(),
            $dto->getTeammateIds()
        );
    }
}
