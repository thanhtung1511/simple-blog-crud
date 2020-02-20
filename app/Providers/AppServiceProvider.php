<?php

namespace App\Providers;

use Barryvdh\Debugbar\Facade;
use Illuminate\Foundation\AliasLoader;
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
        // Sets third party service providers that are only needed on local/testing environments
        if ($this->app->environment() !== 'production') {
            /**
             * Loader for registering facades.
             */
            $loader = AliasLoader::getInstance();

            // Load third party local aliases
            $loader->alias('Debugbar', Facade::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
