<?php

namespace ElasticEqb\Observers;

use ElasticEqb\Listeners\ElasticListener;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class ModelObserver
 *
 * @package ElasticEqb\Observers
 */
class ModelObserver
{

    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;
    /**
     * @var
     */
    protected $events;


    /**
     * @var array
     */
    protected $eloquentEvents = [
        'creating',
        'created',
        'updating',
        'updated',
        'deleting',
        'deleted',
        'saving',
        'saved',
        'restoring',
        'restored',
    ];

    /**
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        // Boot the observer
        $this->boot();
    }


    /**
     * Function to boot indexer
     */
    public function boot()
    {
        $this->events = $this->app->make('events');

        // Loop events
        foreach($this->eloquentEvents as $event) {
            $this->events->listen('eloquent.'.$event.'*', ElasticListener::class . '@'.$event);
        }
    }
}