<?php

namespace App\Http\Requests\Team;


class UpdateTeamRequest extends TeamRequest
{
    const ID = 'id';

    public function getId(): int
    {
        return $this->get(self::ID);
    }
}
