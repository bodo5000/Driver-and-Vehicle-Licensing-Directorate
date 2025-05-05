<?php

namespace App\Providers;

use App\Repositories\Person\PersonInterface;
use App\Repositories\Person\PersonRepository;
use App\Services\Person\PersonContract;
use App\Services\Person\PersonService;
use Illuminate\Support\ServiceProvider;

class PersonProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PersonInterface::class, PersonRepository::class);
        $this->app->bind(PersonContract::class, PersonService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
