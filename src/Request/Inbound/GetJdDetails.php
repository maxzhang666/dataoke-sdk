<?php


namespace MaxZhang\DataokeSdk\Request\Inbound;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 *
 * 京东商品详情
 * 应用场景：
 * 用于查看京东某个具体商品的详细信息，帮助用户购买决策。用于构建单品详情页
 * 接口说明：
 * 通过京东商品skuId查看商品详细信息，最多支持10个商品同时查询
 * Class GetJdDetails
 * @package MaxZhang\DataokeSdk\Request\Inbound
 */
class GetJdDetails extends DataokeRequest
{

    protected $apiMethodName = 'api/dels/jd/goods/get-details';
    protected $version = 'v1.0.0';

    /**
     * @var string 商品skuId，多个使用逗号分隔，最多支持10个skuId同时查询（需使用半角状态下的逗号）
     */
    public $skuIds;

    function generParams()
    {
        return ['skuIds' => $this->skuIds];
    }

    function check()
    {
        if (!isset($this->skuIds)) {
            throw new InvalidArgumentException('skuids is required !');
        }
    }
}