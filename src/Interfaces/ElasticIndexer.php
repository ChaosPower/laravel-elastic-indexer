<?php
namespace ElasticEqb\Interfaces;

/**
 * Interface ElasticIndexer
 *
 * @package ElasticEqb\Interfaces
 */
interface ElasticIndexer
{
    /**
     * @return mixed
     */
    public function indexModel();

    /**
     * @return mixed
     */
    public function getIndex();

    /**
     * @param $index
     *
     * @return mixed
     */
    public function setIndex($index);

    /**
     * @return mixed
     */
    public function getType();

    /**
     * @param $type
     *
     * @return mixed
     */
    public function setType($type);
}