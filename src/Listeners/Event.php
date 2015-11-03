<?php

namespace ElasticEqb\Listeners;

use ElasticEqb\Api\Indices\Index;
use ElasticEqb\Interfaces\ElasticIndexer;
use ElasticEqb\Interfaces\ElasticListener;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * @package ElasticEqb\Listeners
 */
abstract class Event implements ElasticListener
{
    /**
     * @var
     */
    protected $model;
    /**
     * @var Index $indexer
     */
    protected $indexer;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function creating(Model $model)
    {
        $this->indexer($model);

    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function indexer(Model $model)
    {
        // Check model if has instance of ElasticIndexer
        if (!$model instanceof ElasticIndexer) {
            return;
        }

        // Boot model for index
        $model->indexModel();
        $this->indexer = new Index($model);
        $this->indexer->save();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function created(Model $model)
    {
        $this->indexer($model);
        if(!$this->indexer->create()) {
            $this->indexer->document()->save();
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function updating(Model $model)
    {
        $this->indexer($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function updated(Model $model)
    {
        $this->indexer($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function deleting(Model $model)
    {
        $this->indexer($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function deleted(Model $model)
    {
        $this->indexer($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function saving(Model $model)
    {
        $this->indexer($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function saved(Model $model)
    {
        $this->indexer($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function restoring(Model $model)
    {
        $this->indexer($model);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function restored(Model $model)
    {
        $this->indexer($model);
    }
}