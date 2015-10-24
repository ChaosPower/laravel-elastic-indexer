<?php

namespace ElasticEqb\Nodes;


use GuzzleHttp\Client;

class Connection
{
    protected $version;
    protected $client;
    protected $config;

    public function __construct()
    {
        $this->config = config('elastic');
        $this->setVersion($this->config['version']);
        $this->setClient(new Client([
            'base_uri' => ($this->config['ssl']) ? 'https://' : 'http://' . $this->config['host'] . ':' . $this->config['port']
        ]));
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }


}