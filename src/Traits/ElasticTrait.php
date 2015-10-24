<?php

namespace ElasticEqb\Traits;

use ElasticEqb\Api\Documents\Document;
use ElasticEqb\Api\Indices\Index;
use ElasticEqb\Api\Search\Search;
use ReflectionClass;

trait ElasticTrait
{
    protected $classStack = [
        Index::class,
        Document::class,
        Search::class,
    ];

    public function getInstance(ReflectionClass $reflect)
    {
        return $reflect->newInstance([]);
    }
}