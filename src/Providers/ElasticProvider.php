<?php

namespace ElasticEqb\Providers;

use ElasticEqb\Observers\ModelObserver;
//use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Events\Dispatcher;
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
            __DIR__ . '/../../config/elastic.php', 'elastic'
        );
    }

    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../../config/elastic.php' => config_path('elastic.php')
            ], 'config');

        // Check if elastic is set to auto index

        if(config('elastic.auto_index')) {
            /**
             * @var \Illuminate\Contracts\Events\Dispatcher $events
             */
            $events = $this->app->make('events');
            $events->listen('eloquent.saved*', function($model) use($events) {
                new ModelObserver($model, $events);
            });
        }

    }
}