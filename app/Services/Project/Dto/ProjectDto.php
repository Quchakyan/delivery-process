<?php

namespace App\Services\Project\Dto;

use App\Http\Requests\Project\ProjectRequest;

class ProjectDto
{
    public string $name;
    public int $ownerId;
    public float $rate;
    public int $currencyId;
    public $bid;

    public function __construct(ProjectRequest $request)
    {
        $this->name = $request->getName();
        $this->ownerId = $request->getOwnerId();
        $this->rate = $request->getRate();
        $this->currencyId = $request->getCurrencyId();
        $this->bid = $request->getBid();
    }
}
