<?php

namespace App\Providers;

use App\Repositories\Application\ApplicationInterface;
use App\Repositories\Application\ApplicationRepository;
use App\Services\Application\ApplicationContract;
use App\Services\Application\ApplicationService;
use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ApplicationInterface::class, ApplicationRepository::class);
        $this->app->bind(ApplicationContract::class, ApplicationService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
