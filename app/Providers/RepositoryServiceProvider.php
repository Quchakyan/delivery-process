<?php

namespace App\Providers;

use App\Repositories\Read\Currency\CurrencyReadRepository;
use App\Repositories\Read\Currency\CurrencyReadRepositoryInterface;
use App\Repositories\Read\Member\MemberReadRepository;
use App\Repositories\Read\Member\MemberReadRepositoryInterface;
use App\Repositories\Read\Position\PositionsReadRepository;
use App\Repositories\Read\Position\PositionsReadRepositoryInterface;
use App\Repositories\Read\Project\ProjectReadRepository;
use App\Repositories\Read\Project\ProjectReadRepositoryInterface;
use App\Repositories\Read\Role\RolesReadRepository;
use App\Repositories\Read\Role\RolesReadRepositoryInterface;
use App\Repositories\Read\Team\TeamReadRepository;
use App\Repositories\Read\Team\TeamReadRepositoryInterface;
use App\Repositories\Write\Member\MemberWriteRepository;
use App\Repositories\Write\Member\MemberWriteRepositoryInterface;
use App\Repositories\Write\Project\ProjectWriteRepository;
use App\Repositories\Write\Project\ProjectWriteRepositoryInterface;
use App\Repositories\Write\Team\TeamWriteRepository;
use App\Repositories\Write\Team\TeamWriteRepositoryInterface;
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

        $this->app->bind(
            TeamWriteRepositoryInterface::class,
            TeamWriteRepository::class
        );

        $this->app->bind(
            TeamReadRepositoryInterface::class,
            TeamReadRepository::class
        );

        $this->app->bind(
            PositionsReadRepositoryInterface::class,
            PositionsReadRepository::class
        );

        $this->app->bind(
            RolesReadRepositoryInterface::class,
            RolesReadRepository::class
        );

        $this->app->bind(
            CurrencyReadRepositoryInterface::class,
            CurrencyReadRepository::class
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
