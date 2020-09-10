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

| 基础功能API |  | |
| :---- |:----  |----: |
|  | 高效转链 | v1.1.1 |
| 搜索相关API |  |  |
|  | 大淘客搜索 | v2.1.1 |
|  | 超级搜索 | v1.0.1 |
| 特色栏目API |  |  |
|  | 9.9包邮精选 | v1.0.2 |
|  | 各大榜单 | v1.1.2 |
|  | 猜你喜欢 | v1.2.2 |



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