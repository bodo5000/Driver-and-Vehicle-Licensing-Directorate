<?php

namespace App\Providers;

use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use App\Services\User\UserContract;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(UserContract::class, UserService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
