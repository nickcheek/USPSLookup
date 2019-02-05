<?php

namespace Nickcheek\USPSLookup;

use Illuminate\Support\ServiceProvider;

class USPSLookupServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
       
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('uspslookup.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'uspslookup');

        // Register the main class to use with the facade
        $this->app->singleton('uspslookup', function () {
            return new USPSLookup;
        });
    }
}
