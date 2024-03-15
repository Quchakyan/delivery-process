<?php

namespace App\Repositories\Read\Role;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RolesReadRepository implements RolesReadRepositoryInterface
{
    private function query(): Builder
    {
        return Role::query();
    }

    public function index(): Collection
    {
        return $this->query()->get();
    }
}
