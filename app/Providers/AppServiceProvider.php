<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;

use App\Contracts\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
