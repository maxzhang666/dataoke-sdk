<?php


namespace MaxZhang\DataokeSdk\Request\Base;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 淘口令生成
 * 应用场景：
 * 针对导购或返利平台，分享时生成商品淘口令，对于素材圈的商品复制口令；同时可以满足用户提供淘口令生成工具
 * 接口说明：
 * 该接口可以将二合一链接、长链接、短链接等各种淘宝高佣链接，生成淘口令
 * Class CreateTwdRequest
 * @package MaxZhang\DataokeSdk\Request\Base
 */
class CreateTwdRequest extends DataokeRequest
{
    protected $apiMethodName = 'api/tb-service/creat-taokouling';
    protected $version = 'v1.0.0';

    /**
     * @var string 口令弹框内容，长度大于5个字符
     */
    public $text;
    /**
     * @var string 口令跳转目标页，如：https://uland.taobao.com/，必须以https开头，可以是二合一链接、长链接、短链接等各种淘宝高佣链接；支持渠道备案链接。* 该参数需要进行Urlencode编码后传入
     */
    public $url;
    /**
     * @var string 口令弹框logoURL
     */
    public $logo;
    /**
     * @var string 生成口令的淘宝用户ID，非必传参数
     */
    public $userId;

    function generParams()
    {
        return [
            'text'   => $this->text,
            'url'    => $this->url,
            'logo'   => $this->logo,
            'userId' => $this->userId
        ];
    }

    function check()
    {
        if (!isset($this->text)) {
            throw new InvalidArgumentException('text is required!');
        }
        if (!isset($this->url)) {
            throw new InvalidArgumentException('url is required!');
        }
    }
}