<?php

namespace App\Http\Requests\Project;

class UpdateProjectRequest extends ProjectRequest
{
    const ID = 'id';

    public function getId(): int
    {
        return $this->get(self::ID);
    }
}
