<?php

namespace ElasticEqb\Api\Indices;

use ElasticEqb\Abstracts\Model;
use ElasticEqb\Api\Exceptions\JsonError;
use ElasticEqb\Api\Templates\Config\Index as IndexConfig;
use ElasticEqb\Api\Templates\IndicesTemplate;
use GuzzleHttp\Exception\ClientException;


/**
 * @property  _id
 */
class Index extends Model implements IndicesTemplate
{

    /**
     * @var \ElasticEqb\Api\Templates\Config\Index
     */
    protected $config;
    /**
     * @var \ElasticEqb\Api\Templates\Config\Index
     */
    public $settings;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->config = new IndexConfig();
        $this->settings = $this->config;
    }

    /**
     * Check if index exists
     *
     * @param $index
     *
     * @return bool|\Psr\Http\Message\ResponseInterface
     */
    public function has($index)
    {
        try {
            return $this->connection->getClient()->head('/' . $index, ['body' => '']);
        } catch (ClientException $e) {
            if($e->getCode() == 404) {
                return false;
            } else {
                return $e;
            }
        }
    }

    /**
     * @param       $index
     * @param array $config
     *
     * @return bool|\Psr\Http\Message\ResponseInterface
     */
    public function create($index, $config = [])
    {
        if (!$this->has($index)) {
            return $this->connection->getClient()->put('/' . $index . '/', [
                'body' => $this]);
        } else {
            return false;
        }
    }



}