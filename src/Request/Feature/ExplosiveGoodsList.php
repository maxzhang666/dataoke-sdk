<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;

/**
 * 每日爆品推荐
 *
 * 应用场景：
 * 可用于特色栏目专区搭建，或者社群分发推广
 * 接口说明：
 * 该接口返回每天满足联盟爆品规则的商品合集，单价10~20元商品当日销量超过3000单，20~40元商品当日销量超过1000单，大于等于40元的销量超过500单。 （因为统计的是商品当天的销量，所以早上可能存在数量很少的情况。10分钟会刷新一次）
 * Class ExplosiveGoodsList
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class ExplosiveGoodsList extends DataokeRequest
{
    protected $apiMethodName = 'api/goods/explosive-goods-list';
    protected $version = 'v1.0.0';

    /**
     * @var int 分页id：常规分页方式，请直接传入对应页码（比如：1, 2, 3……）
     */
    public $pageId = 1;
    /**
     * @var int 每页返回条数，每页条数支持输入10, 20，50, 100。默认50条
     */
    public $pageSize = 50;
    /**
     * @var string 价格区间，1表示10~20元区；2表示20~40元区；3表示40元以上区；默认为1
     */
    public $priceCid;
    /**
     * @var string 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1, 2, 3”。1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺。不填默认全部
     */
    public $cids;


    function generParams(): array
    {
        return [
            'pageId'   => $this->pageId,
            'pageSize' => $this->pageSize,
            'PriceCid' => $this->priceCid,
            'cids'     => $this->cids
        ];
    }

    function check()
    {
        return true;
    }
}