<?php

namespace ElasticEqb\Abstracts;

use ArrayAccess;
use ElasticEqb\Api\Interfaces\ApiInterface;
use ElasticEqb\Api\Traits\ApiTrait;
use ElasticEqb\Nodes\Connection;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use JsonSerializable;

/**
 * Class Model
 *
 * @package ElasticEqb\Abstracts
 */
abstract class Model implements ArrayAccess, Arrayable, Jsonable, JsonSerializable, ApiInterface
{
    use ApiTrait;

    /**
     * @var \ElasticEqb\Nodes\Connection
     */
    protected $connection;
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(EloquentModel $model)
    {
        $this->connection = new Connection();

        $this->model = $model;
    }

    /**
     * @param mixed $offset
     *
     * @return bool|void
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @param mixed $offset
     *
     * @return mixed|void
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     *
     */
    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }


    /**
     *
     */
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }

    /**
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

}