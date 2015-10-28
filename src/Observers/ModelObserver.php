<?php

namespace ElasticEqb\Observers;

use ElasticEqb\Api\Indices\Index;
use ElasticEqb\Interfaces\ElasticIndexer;
use ElasticEqb\Traits\IndexesModel;
use Event;
use Illuminate\Contracts\Events\Dispatcher;

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

    protected $indexer;

    /**
     * @param                                         $model
     * @param \Illuminate\Contracts\Events\Dispatcher $event
     */
    public function __construct($model, Dispatcher $event)
    {
            if(!$model instanceof ElasticIndexer) {
                return;
            }

            $this->model = $model;
            $this->event = $event;
            $this->indexer = new Index($model);

            $this->boot();
    }


    /**
     * Function for boot indexer
     */
    public function boot()
    {
        // Call the model trait indexer
        $this->model->indexModel();

        // Call Indices
        if (!$this->indexer->create($this->model->index)) {

        }
    }
}