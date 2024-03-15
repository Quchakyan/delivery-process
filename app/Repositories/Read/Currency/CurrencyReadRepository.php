<?php

namespace App\Repositories\Read\Currency;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CurrencyReadRepository implements CurrencyReadRepositoryInterface
{
    public function query(): Builder
    {
        return Currency::query();
    }

    public function index(): Collection
    {
        return $this->query()->get();
    }
}
