<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Paksa https hanya di production
        if (app()->environment('production')) {
            if (config('app.url')) {
                URL::forceRootUrl(config('app.url')); // pastikan root sesuai APP_URL
            }
            URL::forceScheme('https');
        }
    }
}
