<?php

namespace App\Repositories\Write\Team;

use App\Exceptions\Team\TeamDeletingFailedException;
use App\Exceptions\Team\TeamSaveFailedException;
use App\Models\Team;
use App\Repositories\Read\Team\TeamReadRepository;
use App\Services\Team\Dto\TeamDto;
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

        $team->setName($dto->getName())
        ->setOwnerId($dto->getOwnerId());

        $this->save($team);

        return $team;
    }

    public function operateTeam(int $teamLeadId, int $teamId, string $name, ?array $teammateIds = []): bool
    {
        $team = $this->teamReadRepository->getById($teamId);

        $team->setOwnerId($teamLeadId)
            ->setName($name);

        try {
            $this->save($team);
            $team->teammates()->sync($teammateIds);
        } catch (TeamSaveFailedException $e) {
            return $e->getStatusMessage();
        }

        return true;
    }

    /**
     * @throws TeamDeletingFailedException
     */
    public function delete(int $id): void
    {
        $query = $this->query()->where('id',$id);

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
}
