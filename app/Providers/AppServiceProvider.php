<?php

namespace App\Providers;

use App\Services\ShortLinks\Repositories\EloquentStatisticInformationRepository;
use App\Services\ShortLinks\Repositories\StatisticInformationRepositoryInterface;
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
        $this->app->bind(StatisticInformationRepositoryInterface::class, EloquentStatisticInformationRepository::class);
    }
}
