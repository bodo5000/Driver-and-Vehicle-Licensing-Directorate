<?php

namespace App\Providers;

use App\Repositories\ApplicationType\ApplicationTypeInterface;
use App\Repositories\ApplicationType\ApplicationTypeRepository;
use App\Services\ApplicationType\ApplicationTypeContract;
use App\Services\ApplicationType\ApplicationTypeService;
use Illuminate\Support\ServiceProvider;

class ApplicationTypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ApplicationTypeInterface::class, ApplicationTypeRepository::class);
        $this->app->bind(ApplicationTypeContract::class, ApplicationTypeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
