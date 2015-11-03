<?php

namespace ElasticEqb\Test\Models;

use ElasticEqb\Interfaces\ElasticIndexer;
use ElasticEqb\Traits\DoesElasticIndexer;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model implements ElasticIndexer
{
    use DoesElasticIndexer;
}