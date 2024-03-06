<?php

namespace App\Services\Project\Dto;

use App\Http\Requests\Project\UpdateProjectRequest;

/**
 * @property int $id;
 */

class ProjectUpdateDto extends ProjectDto
{
    public function __construct(UpdateProjectRequest $request)
    {
        $this->id = $request->getId();
        parent::__construct($request);
    }

    public function getId(): int
    {
        return $this->id;
    }
}
