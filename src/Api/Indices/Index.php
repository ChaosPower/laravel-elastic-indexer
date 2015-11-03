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
     * @var Document
     */
    protected $document;

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
     * @param array $config
     *
     * @return bool|\Psr\Http\Message\ResponseInterface
     */
    public function create($config = [])
    {
        $index = $this->model->index;

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
            return $e->getCode() == 404 ? false : $e;
        }
    }

    /**
     * Perform Document API
     *
     */
    public function document()
    {
        $this->document = new Document($this->model);
        return $this;
    }

    public function delete()
    {
        return $this->has($this->model->index) ? $this->connection->getClient()->delete('/' . $this->model->index) : false;
    }

    public function save()
    {
        try {
            return $this->connection->getClient()->put('/' . $this->model->index . '/'.$this->model->type.'/'.$this->model->id, [
                'body' => $this->document
            ]);

        } catch (ClientException $e) {
            return false;
        }
    }
}