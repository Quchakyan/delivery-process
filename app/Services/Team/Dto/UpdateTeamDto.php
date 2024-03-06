<?php

namespace App\Services\Team\Dto;

use App\Http\Requests\Team\UpdateTeamRequest;

/**
 * @property int $id;
 */

class UpdateTeamDto extends TeamDto
{
    public function __construct(UpdateTeamRequest $request)
    {
        $this->id = $request->getId();
        parent::__construct($request);
    }

    public function getId(): int
    {
        return $this->id;
    }
}
