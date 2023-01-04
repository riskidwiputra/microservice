<?php

namespace App\Providers;

use App\Modules\order\Interfaces\OrderRepositoryInterface;
use App\Modules\order\Interfaces\OrderServiceInterface;
use App\Modules\order\Repositories\OrderRepository;
use App\Modules\order\Services\OrderService;

use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderServiceInterface::class,OrderService::class);
        $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
