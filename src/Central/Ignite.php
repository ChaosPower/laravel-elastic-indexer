<?php

namespace ElasticEqb\Central;

use ElasticEqb\Listeners\ElasticListener;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class Ignite
 *
 * @package ElasticEqb\Central
 */
class Ignite
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
        // Boot the listeners
        $this->boot();
    }


    /**
     * Function to boot indexer
     * @see
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