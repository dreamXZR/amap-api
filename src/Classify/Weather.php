<?php

namespace Dreamxzr\AmapApi\Classify;

use Dreamxzr\AmapApi\Client\Client;
use Dreamxzr\AmapApi\Exceptions\InvalidArgumentException;
use Dreamxzr\AmapApi\Exceptions\HttpException;

class Weather
{
    protected $key;

    protected $client;

    const API_URL='https://restapi.amap.com/v3/weather/weatherInfo';

    public function __construct(string $key)
    {
        $this->key=$key;
        $this->client=new Client();
    }

    public function getWeather($city,string $type='base',string $format='json')
    {

        if (!\in_array(\strtolower($format), ['xml', 'json'])) {
            throw new InvalidArgumentException('Invalid response format: '.$format);
        }

        if (!\in_array(\strtolower($type), ['base', 'all'])) {
            throw new InvalidArgumentException('Invalid type value(base/all): '.$type);
        }

        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => $format,
            'extensions' =>  $type,
        ]);

        try{
            $response=$this->client->getHttpClient()->get(self::API_URL,[
                'query'=>$query
            ])->getBody()->getContents();
        }catch (\Exception $e){
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }


        return 'json' === $format ? \json_decode($response, true) : $response;
    }
}