<?php

namespace ElasticEqb\Api\Indices;

use ElasticEqb\Abstracts\Model;
use ElasticEqb\Api\Templates\IndicesTemplate;
use GuzzleHttp\Exception\ClientException;


/**
 * @property  _id
 */

class Index extends Model implements IndicesTemplate
{

    /**
     * Check if index exists
     *
     * @param $index
     *
     * @return \Exception|\GuzzleHttp\Exception\ClientException|\Psr\Http\Message\ResponseInterface
     */
    public function has($index)
    {
        try {
            return $this->connection->getClient()->head('/'.$index, ['body'=>'']);
        } catch (ClientException $e) {
            return $e;
        }
    }

}