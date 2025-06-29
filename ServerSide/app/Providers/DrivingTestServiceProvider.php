<?php

namespace App\Providers;

use App\Repositories\DrivingTest\DrivingTestInterface;
use App\Repositories\DrivingTest\DrivingTestRepository;
use App\Services\DrivingTest\DrivingTestContract;
use App\Services\DrivingTest\DrivingTestService;
use Illuminate\Support\ServiceProvider;

class DrivingTestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DrivingTestInterface::class, DrivingTestRepository::class);
        $this->app->bind(DrivingTestContract::class, DrivingTestService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
