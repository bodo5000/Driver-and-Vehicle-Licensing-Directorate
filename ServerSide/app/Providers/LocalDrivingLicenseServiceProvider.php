<?php

namespace App\Providers;

use App\Repositories\LocalDrivingLicense\LocalDrivingLicenseInterface;
use App\Repositories\LocalDrivingLicense\LocalDrivingLicenseRepository;
use App\Services\LocalDrivingLicense\LocalDrivingLicenseContract;
use App\Services\LocalDrivingLicense\LocalDrivingLicenseService;
use Illuminate\Support\ServiceProvider;

class LocalDrivingLicenseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LocalDrivingLicenseInterface::class, LocalDrivingLicenseRepository::class);
        $this->app->bind(LocalDrivingLicenseContract::class, LocalDrivingLicenseService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
