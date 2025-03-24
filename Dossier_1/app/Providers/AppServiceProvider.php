<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\PkgWidget\Providers\PkgWidgetServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->register(PkgWidgetServiceProvider::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }
}
