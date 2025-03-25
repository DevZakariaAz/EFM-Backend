<?php

namespace Modules\PkgWidget\App\Providers;

use Illuminate\Support\ServiceProvider;

class PkgWidgetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
                $this->loadViewsFrom(__DIR__ . '/../../Views', 'PkgWidget');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
