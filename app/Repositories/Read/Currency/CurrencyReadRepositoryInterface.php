<?php

namespace App\Repositories\Read\Currency;

use Illuminate\Database\Eloquent\Collection;

interface CurrencyReadRepositoryInterface
{
    public function index(): Collection;
}
