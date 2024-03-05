<?php

namespace App\Providers;

use App\Repositories\Read\MemberReadRepository\MemberReadRepository;
use App\Repositories\Read\MemberReadRepository\MemberReadRepositoryInterface;
use App\Repositories\Write\MemberWriteRepository\MemberWriteRepository;
use App\Repositories\Write\MemberWriteRepository\MemberWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            MemberWriteRepositoryInterface::class,
            MemberWriteRepository::class);

        $this->app->bind(
            MemberReadRepositoryInterface::class,
            MemberReadRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
