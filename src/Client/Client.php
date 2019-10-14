<?php

namespace Dreamxzr\AmapApi\Client;
use GuzzleHttp\Client as BaseClient;


class Client
{

    protected $guzzleOptions = [];

    public function getHttpClient()
    {
        return new BaseClient($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions=$options;
    }
}