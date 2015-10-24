<?php

namespace ElasticEqb\Abstracts;

use ArrayAccess;
use ElasticEqb\Api\Interfaces\ApiInterface;
use ElasticEqb\Api\Traits\ApiTrait;
use ElasticEqb\Nodes\Connection;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

abstract class Model implements ArrayAccess, Arrayable, Jsonable, JsonSerializable, ApiInterface
{
    use ApiTrait;

    protected $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }


    public function toArray()
    {
        // TODO: Implement toArray() method.
    }

    public function toJson($options = 0)
    {
        // TODO: Implement toJson() method.
    }

}