<?php

namespace App\Services\Project\Action;

use App\Repositories\Read\Currency\CurrencyReadRepository;
use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Read\Project\ProjectReadRepository;
use Illuminate\Support\Collection;
class IndexProjectsAction
{
    public function __construct(
        protected MemberReadRepository $memberReadRepository,
        protected CurrencyReadRepository $currencyReadRepository,
        protected ProjectReadRepository $projectReadRepository
    ){}

    public function run(): Collection
    {
        $data = collect();

        $data['projects'] = $this->projectReadRepository->index();
        $data['members'] = $this->memberReadRepository->index();
        $data['currencies'] = $this->currencyReadRepository->index();

        return $data;
    }
}
