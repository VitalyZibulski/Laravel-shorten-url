<?php

namespace App\Providers;

use App\Services\ShortLinks\Repositories\EloquentShortLinksRepository;
use App\Services\StatisticInformation\Repositories\EloquentStatisticInformationRepository;
use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;
use App\Services\StatisticInformation\Repositories\StatisticInformationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ShortLinksRepositoryInterface::class, EloquentShortLinksRepository::class);
        $this->app->bind(StatisticInformationRepositoryInterface::class, EloquentStatisticInformationRepository::class);
    }
}
