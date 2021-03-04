<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;

/**
 * 京东大牌
 *
 * 应用场景：
 * 可用于搭建京东品牌商品特色栏目，商品质量保证，性价比高，转化高
 * 接口说明：
 * 该接口返回京东自营、旗舰店高性价比的折扣商品，高佣高转化
 * Class ListDiscountBrand
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class ListDiscountBrand extends DataokeRequest
{

    protected $version = 'v1.0.0';
    protected $apiMethodName = 'api/dels/jd/column/list-discount-brand';

    /**
     * @var int 页码（默认为1）
     */
    public $pageId = 1;
    /**
     * @var int 每页记录条数（默认20）
     */
    public $pageSize = 20;

    function generParams()
    {
        return [
            'pageId'   => $this->pageId,
            'pageSize' => $this->pageSize
        ];
    }

    function check()
    {
        return true;
    }
}