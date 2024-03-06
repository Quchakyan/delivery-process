<?php

namespace App\Repositories\Read\Member;

interface MemberReadRepositoryInterface
{
    public function index();

    public function getById(int $id);
}
