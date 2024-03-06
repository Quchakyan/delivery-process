<?php

namespace App\Repositories\Write\Team;

use App\Exceptions\Team\OperatingTeamMembersFailedException;
use App\Exceptions\Team\TeamDeletingFailedException;
use App\Exceptions\Team\TeamSaveFailedException;
use App\Models\Team;
use App\Repositories\Read\Team\TeamReadRepository;
use App\Services\Team\Dto\TeamDto;
use App\Services\Team\Dto\UpdateTeamDto;
use Illuminate\Database\Eloquent\Builder;

class TeamWriteRepository implements TeamWriteRepositoryInterface
{
    public function __construct(protected TeamReadRepository $teamReadRepository)
    {}

    private function query(): Builder
    {
        return Team::query();
    }

    private function newTeam(): Team
    {
        return new Team();
    }

    /**
     * @throws TeamSaveFailedException
     */
    public function create(TeamDto $dto): Team
    {
        $team = $this->newTeam();

        return $this->operateTeam($team, $dto);
    }

    /**
     * @throws TeamSaveFailedException
     */
    public function update(UpdateTeamDto $dto): Team
    {
        $team = $this->teamReadRepository->getById($dto->getId());

        return $this->operateTeam($team, $dto);
    }

    /**
     * @throws TeamSaveFailedException
     */
    private function operateTeam(Team $team, TeamDto $dto): Team
    {
        $team->setName($dto->getName())
            ->setOwnerId($dto->getOwnerId());

        $this->save($team);

        return $team;
    }

    /**
     * @throws TeamDeletingFailedException
     */
    public function delete(int $id): void
    {
        $query = $this->query()->find($id);

        $query->exists() && !$query->delete() && throw new TeamDeletingFailedException();
    }

    /**
     * @throws TeamSaveFailedException
     */
    public function save(Team $team): bool
    {
        if(!$team->save()){
            throw new TeamSaveFailedException();
        }

        return true;
    }

    public function operateTeammates(int $teamId,array $teammateIds = []): bool
    {
        $team = $this->teamReadRepository->getById($teamId);

        try {
            $team->teammates()->sync($teammateIds);
        } catch (OperatingTeamMembersFailedException $e) {
            return $e->getStatusMessage();
        }

        return true;
    }
}
