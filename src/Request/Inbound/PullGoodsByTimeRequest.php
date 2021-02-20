<?php


namespace MaxZhang\DataokeSdk\Request\Inbound;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 定时拉取
 *
 * {
 *     time: 1554711897417,
 *     code: 0,
 *     msg: "成功",
 *     data: {
 *         list: [
 *             {
 *                 id: 21631667,
 *                 goodsId: "599287662104",
 *                 title: "稻香村月饼广式蛋黄莲蓉豆沙散装多口味中秋送礼品团购尝鲜装礼盒",
 *                 dtitle: "【稻香村】9饼9味广式中秋月饼",
 *                 originalPrice: 24.9,
 *                 actualPrice: 14.9,
 *                 shopType: 1,
 *                 goldSellers: 0,
 *                 monthSales: 229734,
 *                 twoHoursSales: 1675,
 *                 dailySales: 281,
 *                 commissionType: 3,
 *                 desc: "【爆款返】【中华老字号，中国驰名商标，传承百年工艺】【聚划算44.9元。拍下立减20元。领10元券。到手价14.9元·】中秋月饼提前“购”，稻花千里，臻品世香，百年传承，九种口味，甜而不腻，口口酥软~",
 *                 couponReceiveNum: 0,
 *                 couponLink: "https://uland.taobao.com/quan/detail?sellerId=2935830269&activityId=fa1211336e194e81b0586e5d1bf38e17",
 *                 couponEndTime: "2019-08-15 23:59:59",
 *                 couponStartTime: "2019-08-15 00:00:00",
 *                 couponPrice: 10,
 *                 couponConditions: "20",
 *                 activityType: 3,
 *                 createTime: "2019-08-15 00:08:03",
 *                 mainPic: "https://img.alicdn.com/imgextra/i2/2531211011/O1CN01R4Wxsc1JL4yRWh8Jj_!!2531211011.png",
 *                 marketingMainPic: "https://sr.ffquan.cn/relate_pic/o_1di0mofb21nb2lqfkc51gv1n2cd.jpg",
 *                 sellerId: "2935830269",
 *                 cid: 6,
 *                 discounts: 0.6,
 *                 commissionRate: 30,
 *                 couponTotalNum: 100000,
 *                 haitao: 0,
 *                 activityStartTime: "2019-08-14 10:00:00",
 *                 activityEndTime: "2019-08-17 08:59:59",
 *                 shopName: "稻香村星皓专卖店",
 *                 shopLevel: 15,
 *                 descScore: 4.8,
 *                 brand: 1,
 *                 brandId: 92540,
 *                 brandName: "稻香村",
 *                 hotPush: 51,
 *                 teamName: "文案工会",
 *                 itemLink: "https://detail.tmall.com/item.htm?id=599287662104",
 *                 tchaoshi: 0,
 *                 detailPics: "",
 *                 dsrScore: -1,
 *                 dsrPercent: -1,
 *                 shipScore: -1,
 *                 shipPercent: -1,
 *                 serviceScore: -1,
 *                 servicePercent: -1,
 *                 subcid: [
 *                     8738,
 *                     90936
 *                 ],
 *                 tbcid: 50008062,
 *                 quanMLink: 10,
 *                 hzQuanOver: 100,
 *                 yunfeixian: 1,
 *                 estimateAmount: 0,
 *                 shopLogo: "https://img.alicdn.com/imgextra//59/df/TB1lJVxNFXXXXcoXFXXSutbFXXX.jpg",
 *                 freeshipRemoteDistrict: 0
 *             }
 *         ],
 *         totalNum: 16499,
 *         pageId: "76679471048598b0"
 *     }
 * }
 * Class PullGoodsByTimeRequest
 * @package MaxZhang\DataokeSdk\Request\Inbound
 */
class PullGoodsByTimeRequest extends DataokeRequest
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