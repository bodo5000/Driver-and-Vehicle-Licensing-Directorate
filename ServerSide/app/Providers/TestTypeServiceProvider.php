<?php

namespace App\Providers;

use App\Repositories\TestType\TestTypeInterface;
use App\Repositories\TestType\TestTypeRepository;
use App\Services\TestType\TestTypeContract;
use App\Services\TestType\TestTypeService;
use Illuminate\Support\ServiceProvider;

class TestTypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TestTypeInterface::class, TestTypeRepository::class);
        $this->app->bind(TestTypeContract::class, TestTypeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
