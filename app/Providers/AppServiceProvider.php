<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        Carbon::setLocale( env('APP_LANGUAGE', 'en'));
        //
        if (env('APP_ENV') !== 'local') {
            \URL::forceScheme('https');
        } else {
            \URL::forceScheme('http');
        }
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour(); 
    }
}
