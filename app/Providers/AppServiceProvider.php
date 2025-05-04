<?php

namespace App\Providers;

use App\Models\Product;
use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ServicecartRepository;
use App\Repositories\ShoopingcartRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ReviewRepository;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use App\Repositories\ServicecartRepositoryInterface;
use App\Repositories\ShoopingcartRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ShoopingcartRepositoryInterface::class, ShoopingcartRepository::class);
        $this->app->bind(ServicecartRepositoryInterface::class, ServicecartRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
