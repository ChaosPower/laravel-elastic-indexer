<?php

namespace ElasticEqb\Providers;

use Illuminate\Support\ServiceProvider;

class ElasticProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/elastic.php', 'elastic'
        );
    }

    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../../config/elastic.php' => config_path('elastic.php')
            ], 'config');
    }
}