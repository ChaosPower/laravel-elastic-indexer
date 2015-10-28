<?php

namespace ElasticEqb\Api\Indices;

use ElasticEqb\Abstracts\Model;
use ElasticEqb\Api\Documents\Document;
use ElasticEqb\Api\Exceptions\JsonError;
use ElasticEqb\Api\Templates\Config\Index as IndexConfig;
use ElasticEqb\Api\Templates\IndicesTemplate;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Database\Eloquent\Model as EloquentModel;


/**
 * @property  _id
 */
class Index extends Model implements IndicesTemplate
{

    /**
     * @var \ElasticEqb\Api\Templates\Config\Index
     */
    public $settings;
    /**
     * @var \ElasticEqb\Api\Templates\Config\Index
     */
    protected $config;
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(EloquentModel $model)
    {
        parent::__construct($model);
        $this->config = new IndexConfig();
        $this->settings = $this->config;
        $this->model = $model;
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
                'body' => $this
            ]);
        }

        return false;
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
            if ($e->getCode() == 404) {
                return false;
            } else {
                return $e;
            }
        }
    }

    /**
     * Perform Document API
     *
     */
    public function document()
    {
        $document = new Document($this->model);

        return $this;
    }
}