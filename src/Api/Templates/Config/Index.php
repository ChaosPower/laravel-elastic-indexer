<?php

namespace ElasticEqb\Api\Templates\Config;

use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

class Index implements JsonSerializable, Jsonable
{
    public $number_of_shards   = 5;
    public $number_of_replicas = 1;

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *        which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

    public function __toString()
    {
        return $this->toJson();
    }
}