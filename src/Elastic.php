<?php
namespace ElasticEqb;

use ElasticEqb\Traits\ElasticTrait;
use ReflectionClass;

abstract class Elastic
{
    use ElasticTrait;

    public function __construct()
    {
        foreach ($this->classStack as $class) {
            $this->boot($class);
        }
    }
    public function boot($class)
    {
        $reflect = new ReflectionClass($class);

        $this->{lcfirst(mb_convert_case($reflect->getShortName(), MB_CASE_TITLE))} = $reflect;

        return $this;
    }
}