<?php
/**
 * User: MaxZhang
 * Email:q373884384@gmail.com
 * Date: 2019/8/15 0015
 * Time: 22:46
 */

namespace MaxZhang\DataokeSdk\Request\Search;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 大淘客搜索
 * Class DTKSearchRequest
 * @package MaxZhang\DataokeSdk\Request\Search
 */
class DTKSearchRequest extends DataokeRequest
{
    protected $apiMethodName = "api/goods/get-dtk-search-goods";

    public $version = "v2.1.1";
    /**
     * @var int    每页条数 默认100 ，可选范围：10,50,100,200，如果小于10按10处理，大于200按照200处理，其它非范围内数字按100处理
     */
    public $pageSize;
    /**
     * @var string 分页id 默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
     */
    public $pageId;
    /**
     * @var string  关键词搜索
     */
    public $keyWords;
    /**
     * @var string     一级类目Id 大淘客的一级分类id，如果需要传多个，以英文逗号相隔，如：”1,2,3”。当一级类目id和二级类目id同时传入时，会自动忽略二级类目id，一级分类id请求详情：1 -女装，2 -母婴，3 -美妆，4 -居家日用，5 -鞋品，6 -美食，7 -文娱车品，8 -数码家电，9 -男装，10 -内衣，11 -箱包，12 -配饰，13 -户外运动，14 -家装家纺
     */
    public $cids;
    /**
     * @var int 二级类目Id 大淘客的二级类目id，通过超级分类API获取。仅允许传一个二级id，当一级类目id和二级类目id同时传入时，会自动忽略二级类目id
     */
    public $subcid;
    /**
     * @var int 是否聚划算 1-聚划算商品，0-所有商品，不填默认为0
     */
    public $juHuaSuan;
    /**
     * @var int 是否淘抢购 1-淘抢购商品，0-所有商品，不填默认为0
     */
    public $taoQiangGou;
    /**
     * @var int 是否天猫商品 1-天猫商品，0-所有商品，不填默认为0
     */
    public $tmall;
    /**
     * @var int 是否天猫超市商品 1-天猫超市商品，0-所有商品，不填默认为0
     */
    public $tchaoshi;
    /**
     * @var int 是否金牌卖家 1-金牌卖家，0-所有商品，不填默认为0
     */
    public $goldSeller;
    /**
     * @var int 是否海淘商品 1-海淘商品，0-所有商品，不填默认为0
     */
    public $haitao;

    /**
     * @var int 是否品牌商品 1-品牌商品，0-所有商品，不填默认为0
     */
    public $brand;

    /**
     * @var string 品牌id 当brand传入0时，再传入brandIds将获取不到结果。品牌id可以传多个，以英文逗号隔开，如：”345, 321, 323”
     */
    public $brandIds;

    /**
     * @var int 价格（券后价）下限
     */
    public $priceLowerLimit;
    /**
     * @var int 价格（券后价）上限
     */
    public $priceUpperLimit;
    /**
     * @var int 最低优惠券面额
     */
    public $couponPriceLowerLimit;
    /**
     * @var int 最低佣金比率
     */
    public $commissionRateLowerLimit;
    /**
     * @var int 最低月销量
     */
    public $monthSalesLowerLimit;
    /**
     * @var string 排序字段 默认为0，0-综合排序，1-商品上架时间从新到旧，2-销量从高到低，3-领券量从高到低，4-佣金比例从高到低，5-价格（券后价）从高到低，6-价格（券后价）从低到高
     */
    public $sort;


    function generParams()
    {
        return array(
            'version' => $this->version,
            'pageSize' => $this->pageSize,
            'pageId' => $this->pageId,
            'keyWords' => $this->keyWords,
            'cids' => $this->cids,
            'subcid' => $this->subcid,
            'juHuaSuan' => $this->juHuaSuan,
            'taoQiangGou' => $this->taoQiangGou,
            'tmall' => $this->tmall,
            'tchaoshi' => $this->tchaoshi,
            'goldSeller' => $this->goldSeller,
            'haitao' => $this->haitao,
            'brand' => $this->brand,
            'brandIds' => $this->brandIds,
            'priceLowerLimit' => $this->priceLowerLimit,
            'priceUpperLimit' => $this->priceUpperLimit,
            'couponPriceLowerLimit' => $this->couponPriceLowerLimit,
            'commissionRateLowerLimit' => $this->commissionRateLowerLimit,
            'monthSalesLowerLimit' => $this->monthSalesLowerLimit,
            'sort' => $this->sort);
    }

    function check()
    {
        if (empty($this->pageSize)) {
            throw new InvalidArgumentException("pageSize must be required!");
        }
        if (empty($this->pageId)) {
            throw new InvalidArgumentException("pageId must be required!");
        }
        if (empty($this->keyWords)) {
            throw new InvalidArgumentException("keyWords must be required!");
        }
    }
}