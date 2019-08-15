<h1 align="center"> suning-sdk</h1>

<p align="center"> 基于大淘客开放平台Api封装的 Composer Package 组件包.</p>

## 目录结构：
- src //项目目录

## 安装：

```
$ composer require maxzhang/suning-sdk
```
## 说明:
### 目前完成：
- 政企业务(govbus)
- 联盟商品(union)
- 优惠券(netalliance)


[官方文档](http://openpre.cnsuning.com/ospos/apipage/toApiListMenu.do)

>其他官方功能API 添加封装方法 参考 
`/src/Request/govbus/`
下的实现

## 使用方法:
```php
use MaxZhang\SuningSdk\Request\Govbus\CategoryGetRequest;
use MaxZhang\SuningSdk\DefaultSuningClient;
```
```php
$req = new CategoryGetRequest();
$req->setCheckParam('true');
$assertArray = [
    'serverUrl' => 'http://openpre.cnsuning.com/api/http/sopRequest',
    'appKey' => 'b49970b52c88dee1d7c1743da32cedd2',
    'appSecret' => '2ae2da81c64ae149c2aeb99a535508b0',
    'format' => 'json'
];
$client = new DefaultSuningClient($assertArray['serverUrl'], $assertArray['appKey'],
    $assertArray['appSecret'], $assertArray['format']);

$resp = $client->execute($req);
$reqJson = $req->getReqJson();
print_r("请求报文:\n" . $reqJson);
print_r("\n返回响应报文:\n" . $resp);

```
###laravel 框架中使用


>laravel 5.5以下安排完毕后需要自行配置ServiceProvider：

`config/app.php`文件`providers`中添加
`MaxZhang\SuningSdk\ServiceProvider::class`
```php
 'providers' => [
        ...
        MaxZhang\SuningSdk\ServiceProvider::class
    ],
```
>laravel >=5.5 自动注册


<p>1.安装完毕后，config/services.php添加appkey等相关配置</p>

```php
'suningSdk' => [
    'appKey' => env('SUNING_SDK_APPKEY'),
    'appSecret' => env('SUNING_SDK_APPSECRET'),
    'serverUrl' => env('SUNING_SDK_SERVERURL'),
    'format' => env('SUNING_SDK_FORMAT'),
],
```
<p>2. .env文件中新增配置项</p>

```php
SUNING_SDK_APPKEY= 你的appkey
SUNING_SDK_APPSECRET= 你的appSecret
SUNING_SDK_SERVERURL=http://openpre.cnsuning.com/api/http/sopRequest
SUNING_SDK_FORMAT=json
```
<p>3. 配置完毕，新建控制器 开始写业务代码</p>

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaxZhang\SuningSdk\Request\Govbus\CategoryGetRequest;
use MaxZhang\SuningSdk\DefaultSuningClient;

class CategoryGet extends Controller
{
    public function show(Request $request)
    {

        $req = new CategoryGetRequest();

        $req->setCheckParam('true');
        $resp =app('suningSdk')->execute($req);
        $reqJson = $req->getReqJson();
        print_r("请求报文:\n" . $reqJson);
        print_r("\n返回响应报文:\n" . $resp);
        $request->json($resp);
    }
}
```
>如上，可以用两种方式来获取 MaxZhang\SunningSdk\DefaultSuningClient 实例：

###方法注入
```php
    public function show(DefaultSuningClient $defaultSuningClient) 
    {
        ...
        $response = $defaultSuningClient->execute('$req');
    }
```
###服务名访问
```php
    public function show() 
    {
        ...
        $response =app('suningSdk')->execute($req);
    }
```



### 相关链接
[苏宁开放平台-SDK下载介绍](http://openpre.cnsuning.com/ospos/apipage/toDocContent.do?menuId=28) 

## License

Apache Licence 2.0

