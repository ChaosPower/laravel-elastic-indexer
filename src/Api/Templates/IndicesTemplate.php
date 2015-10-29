<?php

namespace ElasticEqb\Api\Templates;

interface IndicesTemplate
{
    public function has($index);
    public function create($config = []);
    public function document();
}