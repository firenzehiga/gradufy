<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- ini harus diimport
use Illuminate\Support\Facades\Config; // <-- ini juga harus diimport

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Ensure proper asset URLs in production
        if (config('app.env') === 'production' && config('app.url')) {
            URL::forceRootUrl(config('app.url'));
        }
    }
}