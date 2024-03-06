<?php

namespace App\Services\Project\Dto;

use App\Http\Requests\Project\UpdateProjectRequest;

class ProjectUpdateDto extends ProjectDto
{
    public int $id;

    public function __construct(UpdateProjectRequest $request)
    {
        $this->id = $request->getId();
        parent::__construct($request);
    }
}
