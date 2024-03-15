<?php

namespace App\Services\Team\Dto;

use App\Http\Requests\Team\TeamRequest;

class TeamDto
{
    protected string $name;
    protected int $ownerId;

    public function __construct(TeamRequest $request)
    {
        $this->name = $request->getName();
        $this->ownerId = $request->getOwnerId();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }
}
