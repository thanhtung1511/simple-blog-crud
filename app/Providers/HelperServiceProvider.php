<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Class HelperServiceProvider.
 */
class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        $rdi = new RecursiveDirectoryIterator(app_path('Helpers'));
        $rii = new RecursiveIteratorIterator($rdi);

        while ($rii->valid()) {
            if (
                ! $rii->isDot() &&
                $rii->isFile() &&
                $rii->isReadable() &&
                $rii->current()->getExtension() === 'php' &&
                strpos($rii->current()->getFilename(), 'Helper')
            ) {
                require $rii->key();
            }

            $rii->next();
        }
    }
}
