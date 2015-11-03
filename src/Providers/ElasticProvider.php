<?php

namespace ElasticEqb\Providers;

use ElasticEqb\Central\Ignite;
use Illuminate\Support\ServiceProvider;

/**
 * Class ElasticProvider
 *
 * @package ElasticEqb\Providers
 */
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
            __DIR__ . '/../../config/elastic.php', 'elastic'
        );

    }

    /**
     * Boot model observer
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../../config/elastic.php' => config_path('elastic.php')
            ], 'config');

        // Check if elastic is set to auto index
        if (config('elastic.auto_index')) {
            new Ignite($this->app);
        }
    }
}