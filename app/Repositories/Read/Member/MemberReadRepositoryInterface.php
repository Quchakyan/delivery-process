<?php

namespace App\Repositories\Read\Member;

use Illuminate\Database\Eloquent\Collection;

interface MemberReadRepositoryInterface
{
    public function index();

    public function getById(int $id);
    public function getWithStudents(): Collection;
    public function getWithProjects(): Collection;
    public function getUsersWhichWasNotPractician(): Collection;
}
