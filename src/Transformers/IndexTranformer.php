<?php

namespace ElasticEqb\Transformers;

use ElasticEqb\Api\Indices\Index;
use League\Fractal\TransformerAbstract;

class IndexTransformer extends TransformerAbstract
{

    public function transform(Index $index)
    {
        return [
            'id' => $index->_id
        ];
    }

}