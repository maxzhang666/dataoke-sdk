<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 *  热门主播力荐商品
 *
 * 应用场景：
 * 可用于搭建淘宝直播商品特色栏目，高转化高收益
 * 接口说明：
 * 该接口返回淘宝热门主播直播推荐的商品，高热度高反响，助您提高转化
 * Class LiveGoodsListRequest
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class LiveGoodsListRequest extends DataokeRequest
{
    protected $version = '1.0.0';
    protected $apiMethodName = 'api/live/goods-list';


    /**
     * @var int 每页返回条数，每页条数支持输入10,20，50
     */
    public $pageSize;

    /**
     * @var string|int 分页id：常规分页方式，请直接传入对应页码（比如：1,2,3……）
     */
    public $pageId;


    function generParams()
    {
        return [
            'pageSize' => $this->pageSize,
            'pageId'   => $this->pageId
        ];
    }

    function check()
    {
        if (!isset($this->pageId)) {
            throw new InvalidArgumentException("pageId is required!");
        }
        if (!isset($this->pageSize)) {
            throw new InvalidArgumentException("pageSize is required!");
        }
    }
}