<?php

namespace App\Providers;

use App\Http\View\Composers\GlobalComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        // Global composer
        View::composer(
            // This class binds the $logged_in_user variable to every view
            '*',
            GlobalComposer::class
        );

        // Frontend composer

        // Backend composer
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
