<?php

namespace Dreamxzr\AmapApi;

use Dreamxzr\AmapApi\Classify\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->registerWeather();
    }

    public function boot()
    {

        $this->publishes([
            __DIR__.'/../config/amap-api.php' => config_path('amap-api.php'),
        ]);

    }

    protected function registerWeather()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/amap-api.php', 'amap-api'
        );
        $this->app->singleton(Weather::class,function (){
            return new Weather(config('amap-api.key'));
        });
        $this->app->alias(Weather::class,'amap-weather');
    }

    public function provides()
    {
        return [Weather::class, 'amap-weather'];
    }
}