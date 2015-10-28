<?php

namespace ElasticEqb\Observers;

use Illuminate\Contracts\Events\Dispatcher;
use Event;
use ReflectionClass;

/**
 * Class ModelObserver
 *
 * @package ElasticEqb\Observers
 */
class ModelObserver
{
    /**
     * @var
     */
    protected $model;
    /**
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $event;

    /**
     * @param                                         $model
     * @param \Illuminate\Contracts\Events\Dispatcher $event
     */
    public function __construct($model, Dispatcher $event)
    {
        $this->model = $model;
        $this->event = $event;

        $this->boot();
    }


    /**
     * Function for boot indexer
     */
    public function boot()
    {
        // Call the model trait indexer
        $this->model->indexModel();
    }
}