<?php

namespace App\Repositories\Read\Position;

use App\Models\Position;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PositionsReadRepository implements PositionsReadRepositoryInterface
{
    private function query(): Builder
    {
        return Position::query();
    }

    public function index(): Collection
    {
        return $this->query()->get();
    }
}
