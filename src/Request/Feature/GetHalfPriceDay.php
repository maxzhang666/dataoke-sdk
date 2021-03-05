<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 每日半价
 * 应用场景：
 * 可用于特色营销栏目搭建或社群分发推广
 * 接口说明：
 * 该接口返回每日半价活动商品，可用于吸引用户下单，打造半价爆款商品，提高流量变现！
 * Class GetHalfPriceDay
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class GetHalfPriceDay extends DataokeRequest
{

    protected $apiMethodName = 'api/goods/get-half-price-day ';

    protected $version = 'v1.0.0';
    /**
     * @var string 默认为当前时间场次，场次输入格式，例如02、08、12、16（具体可以参考返回参数中的：hpdTime）
     */
    public $sessions;

    function generParams()
    {
        return [
            'sessions' => $this->sessions
        ];
    }

    function check()
    {
        if (!isset($this->sessions)) {
            throw new InvalidArgumentException('sessions is required!');
        }
    }
}