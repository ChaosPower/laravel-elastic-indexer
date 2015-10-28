<?php

namespace ElasticEqb\Api\Documents;

use ElasticEqb\Abstracts\Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;


/**
 * @property  _id
 */

class Document extends Model
{
    public function __construct(EloquentModel $model)
    {
        parent::__construct($model);

    }
}