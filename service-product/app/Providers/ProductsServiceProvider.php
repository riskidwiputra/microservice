<?php

namespace App\Providers;

use App\Modules\products\Interfaces\ProductsRepositoryInterface;
use App\Modules\products\Interfaces\ProductsServiceInterface;
use App\Modules\products\Repositories\ProductsRepository;
use App\Modules\products\Services\ProductsService;

use Illuminate\Support\ServiceProvider;

class ProductsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductsServiceInterface::class,ProductsService::class);
        $this->app->bind(ProductsRepositoryInterface::class,ProductsRepository::class);
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
