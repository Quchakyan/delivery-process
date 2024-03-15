<?php

namespace App\Repositories\Read\Role;

use Illuminate\Database\Eloquent\Collection;

interface RolesReadRepositoryInterface
{
    public function index(): Collection;
}
