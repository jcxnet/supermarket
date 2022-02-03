<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Data\Repository\CategoryRepositoryInterface',
            'App\Data\Repository\CategoryRepository'
        );
        $this->app->bind(
            'App\Data\Repository\CompanyRepositoryInterface',
            'App\Data\Repository\CompanyRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
