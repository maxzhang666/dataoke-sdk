<?php


namespace MaxZhang\DataokeSdk\Request\Inbound;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

class PullGoodsByTime extends DataokeRequest
{

    /**
     * @var string
     */
    protected $apiMethodName = 'api/goods/pull-goods-by-time';

    /**
     * @var string
     */
    protected $version = 'v1.2.3';

    /**
     * @var int 每页条数，默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200
     */
    public $pageSize = 100;

    /**
     * @var int 分页id，默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
     */
    public $pageId;

    /**
     * @var string 大淘客的一级分类id。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
     */
    public $cid;


    /**
     * @var int 大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
     */
    public $subcid;

    /**
     * @var int 是否预告商品，1-预告商品，0-所有商品，不填默认为0
     */
    public $pre;

    /**
     * @var string 排序方式，默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
     */
    public $sort;

    /**
     * @var string 开始时间，格式为yy-mm-dd hh:mm:ss，商品上架的时间大于等于开始时间
     */
    public $startTime;

    /**
     * @var string 结束时间，默认为请求的时间，商品上架的时间小于等于结束时间
     */
    public $endTime;

    /**
     * @var int 偏远地区包邮，1-是，0-非偏远地区，不填默认所有商品
     */
    public $freeshipRemoteDistrict;

    /**
     *
     */
    function generParams(): array
    {
        return [
            'pageSize'               => $this->pageSize,
            'pageId'                 => $this->pageId,
            'cid'                    => $this->cid,
            'subcid'                 => $this->subcid,
            'pre'                    => $this->pre,
            'sort'                   => $this->sort,
            'startTime'              => $this->startTime,
            'endTime'                => $this->endTime,
            'freeshipRemoteDistrict' => $this->freeshipRemoteDistrict
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    function check()
    {
        if (empty($this->pageId) || $this->pageId == 0) {
            throw new InvalidArgumentException('pageId id or id must required');
        }
    }
}