<?php

namespace ElasticEqb\Api\Documents;

use ElasticEqb\Abstracts\Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;


/**
 * @property  _id
 */

class Document extends Model
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(EloquentModel $model)
    {
        parent::__construct($model);

        return $this->__toString();
    }

    public function __toString()
    {
        return $this->model->toJson();
    }
}