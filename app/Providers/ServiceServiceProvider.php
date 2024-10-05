<?php

namespace App\Providers;

use App\Http\Services\Interfaces\UserSubscriptionServiceInterface;
use App\Http\Services\UserSubscriptionService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserSubscriptionServiceInterface::class, UserSubscriptionService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
