<?php
namespace ElasticEqb\Interfaces;

interface ElasticIndexer
{
    public function indexModel();

    public function getIndex();

    public function setIndex($index);

    public function getType();

    public function setType($type);
}