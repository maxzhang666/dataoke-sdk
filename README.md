<h1 align="center"> Dataoke-sdk</h1>

<p align="center"> 基于大淘客开放平台Api封装的 Composer Package 组件包.</p>

## 目录结构：
- src //项目目录

## 安装：

```
$ composer require maxzhang/dataoke-sdk
```
## 说明:
### 目前完成：

| 分类 |名称  |版本 |应用场景|接口说明|
| :---- |:----  |:---- |:----|:----|
| 基础功能API |  | |||
|  | 高佣转链 | v1.1.1 |可用于导购平台的高拥转链工具|[接口说明](http://www.dataoke.com/pmc/api-d.html?id=7)|
| 搜索相关API |  |  |||
|  | 大淘客搜索 | v2.1.1 |基于大淘客商品数据进行搜索|[接口说明](http://www.dataoke.com/pmc/api-d.html?id=9)|
|  | 超级搜索 | v1.0.1 |基于大淘客和淘宝联盟的商品两个平台的数据进行搜索，优先搜索大淘客优质商品，若查不到则会请求联盟商品。推荐在CMS等导购网站中使用|[接口说明](http://www.dataoke.com/pmc/api-d.html?id=14)|
| 特色栏目API |  |  |||
|  | 9.9包邮精选 | v1.0.2 |可用于搭建淘客导购软件：网站，cms，公众号，小程序等应用的特色栏目||
|  | 各大榜单 | v1.1.2 |可用于搭建自己的特色榜单，帮助用户快速决策购买优质的商品，提升选品体验||
|  | 猜你喜欢 | v1.2.2 |可用于用户查看某个商品详情后相关商品的推荐或首页内容推荐|[接口说明](http://www.dataoke.com/pmc/api-d.html?id=16)|



[官方文档](http://www.dataoke.com/pmc/api-market.html)


## 使用方法(参考suning-sdk):
```php
use MaxZhang\DataokeSdk\Request\Govbus\CategoryGetRequest;
use MaxZhang\DataokeSdk\DefaultDataokeClient;
```
```php
$req = new CategoryGetRequest();
$assertArray = [
    'serverUrl' => 'https://openapi.dataoke.com',
    'appKey' => 'b49970b52c88dee1d7c1743da32cedd2',
    'appSecret' => '2ae2da81c64ae149c2aeb99a535508b0'
];
$client = new DefaultDataokeClient($assertArray['serverUrl'], $assertArray['appKey'],
    $assertArray['appSecret']);

$resp = $client->execute($req);
$reqJson = $req->getReqJson();
print_r("请求报文:\n" . $reqJson);
print_r("\n返回响应报文:\n" . $resp);

```
###laravel 框架中使用


>laravel 5.5以下安排完毕后需要自行配置ServiceProvider：

`config/app.php`文件`providers`中添加
`MaxZhang\DataokeSdk\ServiceProvider::class`
```php
 'providers' => [
        ...
        MaxZhang\DataokeSdk\ServiceProvider::class
    ],
```
>laravel >=5.5 自动注册


<p>1.安装完毕后，config/services.php添加appkey等相关配置</p>

```php
'dataokeSdk' => [
    'appKey' => env('DATAOKE_SDK_APPKEY'),
    'appSecret' => env('DATAOKE_SDK_APPSECRET'),
    'serverUrl' => env('DATAOKE_SDK_SERVERURL')    
],
```
<p>2. .env文件中新增配置项</p>

```php
DATAOKE_SDK_APPKEY= 你的appkey
DATAOKE_SDK_APPSECRET= 你的appSecret
DATAOKE_SDK_SERVERURL=https://openapi.dataoke.com
```
<p>3. 配置完毕，新建控制器 开始写业务代码</p>

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaxZhang\DataokeSdk\Request\Govbus\CategoryGetRequest;
use MaxZhang\DataokeSdk\DefaultDataokeClient;

class CategoryGet extends Controller
{
    public function show(Request $request)
    {

        $req = new CategoryGetRequest();

        
        $resp =app('dataokeSdk')->execute($req);
        $reqJson = $req->getReqJson();
        print_r("请求报文:\n" . $reqJson);
        print_r("\n返回响应报文:\n" . $resp);
        $request->json($resp);
    }
}
```
>如上，可以用两种方式来获取 MaxZhang\DataokeSdk\DefaultDataokeClient 实例：

### 方法注入
```php
    public function show(DefaultDataokeClient $defaultDataokeClient) 
    {
        ...
        $response = $defaultDataokeClient->execute('$req');
    }
```
### 服务名访问
```php
    public function show() 
    {
        ...
        $response =app('dataokeSdk')->execute($req);
    }
```
## License

MIT Licence 2.0