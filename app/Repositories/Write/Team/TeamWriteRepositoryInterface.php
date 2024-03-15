<?php

namespace App\Repositories\Write\Team;

use App\Models\Team;
use App\Services\Team\Dto\TeamDto;

interface TeamWriteRepositoryInterface
{
    public function create(TeamDto $dto): Team;
    public function operateTeam(int $teamLeadId, int $teamId, string $name, ?array $teammateIds = []): bool;
    public function delete(int $id): void;
    public function save(Team $team): bool;

}
