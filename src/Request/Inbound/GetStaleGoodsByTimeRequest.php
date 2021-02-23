<?php


namespace MaxZhang\DataokeSdk\Request\Base;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 失效商品
 * Class GetStaleGoodsByTimeRequest
 * @package MaxZhang\DataokeSdk\Request\Base
 */
class GetStaleGoodsByTimeRequest extends DataokeRequest
{

    protected $apiMethodName = "api/goods/get-stale-goods-by-time";
    protected $version = "v1.0.1";

    /**
     * @var int 每页条数，默认为100，最大值200，若小于10，则按10条处理，每页条数仅支持输入10,50,100,200
     */
    public $pageSize = 100;
    /**
     * @var int 分页id，默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
     */
    public $pageId = 1;
    /**
     * @var string 开始时间，默认为yyyy-mm-dd hh:mm:ss，商品下架的时间大于等于开始时间，开始时间需要在当日
     */
    public $startTime;
    /**
     * @var string 结束时间，默认为请求的时间，商品下架的时间小于等于结束时间，结束时间需要在当日
     */
    public $endTime;


    function generParams(): array
    {
        return [
            'pageSize'  => $this->pageSize,
            'pageId'    => $this->pageId,
            'startTime' => $this->startTime,
            'endTime'   => $this->endTime
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    function check()
    {
        if (empty($this->goodsId)) {
            throw  new InvalidArgumentException("pageId must be required!");
        }
    }
}