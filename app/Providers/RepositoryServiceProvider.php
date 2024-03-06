<?php

namespace App\Providers;

use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Read\Member\MemberReadRepositoryInterface;
use App\Repositories\Read\Project\ProjectReadRepository;
use App\Repositories\Read\Project\ProjectReadRepositoryInterface;
use App\Repositories\Write\Member\MemberWriteRepository;
use App\Repositories\Write\Member\MemberWriteRepositoryInterface;
use App\Repositories\Write\Project\ProjectWriteRepository;
use App\Repositories\Write\Project\ProjectWriteRepositoryInterface;
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

        $this->app->bind(
            ProjectReadRepositoryInterface::class,
            ProjectReadRepository::class
        );

        $this->app->bind(
            ProjectWriteRepositoryInterface::class,
            ProjectWriteRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
