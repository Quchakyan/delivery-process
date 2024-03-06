<?php

namespace App\Repositories\Read\MemberReadRepository;

interface MemberReadRepositoryInterface
{
    public function index();

    public function getById(int $id);
}
