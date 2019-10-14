<h1 align="center"> 高德地图api </h1>

<p align="center"> 基于laravel的高德开放平台api扩展包 </p>

## 使用要求
- PHP >=7.0
- Laravel >= 5.5

## 安装

```shell
$ composer require dreamxzr/amap-api -vvv
```

## 配置

1.发布配置文件
```shell
php artisan vendor:publish --provider="Dreamxzr\AmapApi\ServiceProvider"
```
2.在.env文件添加
```shell
AMAP-KEY=高德开放平台api
```
## 使用
1.天气接口
```shell
app('amap-weather')->getWeather('城市名');
```

## License

MIT