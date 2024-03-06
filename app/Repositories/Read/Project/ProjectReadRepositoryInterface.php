<?php

namespace App\Repositories\Read\Project;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

interface ProjectReadRepositoryInterface
{
    public function index(): Collection;

    public function getById(int $id): Project;
}
