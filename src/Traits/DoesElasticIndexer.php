<?php
namespace ElasticEqb\Traits;

use ElasticEqb\Api\Indices\Index;
use ReflectionClass;

/**
 * Class DoesElasticIndexer
 *
 * @package ElasticEqb\Traits
 */
trait DoesElasticIndexer
{
    /**
     * @var
     */
    public $index;
    /**
     * @var
     */
    public $type;

    /**
     * Index the model
     *
     * @internal param $model
     */
    public function indexModel()
    {
        // If index or type is not overridden
        if(!$this->index || !$this->type) {
            $reflect = new ReflectionClass($this);
            $strtolower = strtolower($reflect->getShortName());
            $this->index = str_plural($strtolower);
            $this->type = $strtolower;
        }
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}