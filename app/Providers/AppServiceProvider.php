<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Events\RequestExportCredentials;
use App\Listeners\DispatchExportCredentials;

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
        Event::listen(
            RequestExportCredentials::class,
            DispatchExportCredentials::class
        );
    }
}
