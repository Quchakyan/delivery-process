<?php

namespace App\Repositories\Read\Position;

use Illuminate\Database\Eloquent\Collection;

interface PositionsReadRepositoryInterface
{
    public function index(): Collection;
}
