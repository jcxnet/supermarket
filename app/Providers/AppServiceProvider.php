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
        $this->app->bind(
            'App\Data\Repository\StoreRepositoryInterface',
            'App\Data\Repository\StoreRepository'
        );
        $this->app->bind(
            'App\Data\Repository\ContactRepositoryInterface',
            'App\Data\Repository\ContactRepository'
        );
        $this->app->bind(
            'App\Data\Repository\ProductRepositoryInterface',
            'App\Data\Repository\ProductRepository'
        );
        $this->app->bind(
            'App\Data\Repository\CustomerRepositoryInterface',
            'App\Data\Repository\CustomerRepository'
        );
        $this->app->bind(
            'App\Data\Repository\OrderRepositoryInterface',
            'App\Data\Repository\OrderRepository'
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
