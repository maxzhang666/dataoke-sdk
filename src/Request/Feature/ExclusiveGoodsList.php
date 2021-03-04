<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 大淘客独家券商品
 *
 * 应用场景：
 * 大淘客平台独家优惠券，可用于创建营销栏目。
 * 接口说明：
 * 该接口返回大淘客独家的优惠券商品资源，拥有独家优势。助力淘客推广
 * Class ExclusiveGoodsList
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class ExclusiveGoodsList extends DataokeRequest
{

    protected $apiMethodName = 'api/goods/exclusive-goods-list';
    protected $version = 'v1.0.0';

    /**
     * @var int 是 每页返回条数，每页条数支持输入10,20，50,100。默认50条
     */
    public $pageSize = 50;
    /**
     * @var int 是 分页id：常规分页方式，请直接传入对应页码（比如：1, 2, 3……）
     */
    public $pageId;
    /**
     * @var string 否 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1, 2, 3”。
     */
    public $cids;
    /**
     * @var string 否 排序方式，默认为0，0-综合排序，1-商品上架时间从高到低，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
     */
    public $sort;

    function generParams()
    {
        return [
            'pageSize' => $this->pageSize,
            'pageId'   => $this->pageId,
            'cids'     => $this->cids,
            'sort'     => $this->sort
        ];
    }

    function check()
    {
        if (empty($this->pageSize)) {
            throw new InvalidArgumentException('pageSize is required!');
        }
        if (empty($this->pageId)) {
            throw new InvalidArgumentException('pageId is required!');
        }
    }
}