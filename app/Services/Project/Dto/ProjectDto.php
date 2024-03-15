<?php

namespace App\Services\Project\Dto;

use App\Http\Requests\Project\ProjectRequest;

class ProjectDto
{
    protected string $name;
    protected int $ownerId;
    protected float $rate;
    protected int $currencyId;
    protected int $bid;
    public function __construct(ProjectRequest $request)
    {
        $this->name = $request->getName();
        $this->ownerId = $request->getOwnerId();
        $this->rate = $request->getRate();
        $this->currencyId = $request->getCurrencyId();
        $this->bid = $request->getBid();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function getCurrencyId(): int
    {
        return $this->currencyId;
    }

    public function getBid(): int
    {
        return $this->bid;
    }
}
