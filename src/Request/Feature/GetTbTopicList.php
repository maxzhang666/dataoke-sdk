<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 官方活动（淘宝1元购）
 * 可用于导购平台的活动推广专区
 * 接口返回联盟最新官方活动推广精品内容，成品页面适配，快速接入，不错过每一次精彩活动。淘宝1元购活动ID：20150318020003158
 * Class GetTbTopicList
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class GetTbTopicList extends DataokeRequest
{

    protected $apiMethodName = '/api/category/get-tb-topic-list';
    protected $version = 'v1.2.0';

    /**
     * @var string 分页id，支持传统的页码分页方式
     */
    public $pageId;
    /**
     * @var int 每页条数，默认为20
     */
    public $pageSize;
    /**
     * @var int 输出的端口类型：0.全部（默认），1.PC，2.无线
     */
    public $type;
    /**
     * @var int 阿里妈妈上申请的渠道id
     */
    public $channelId;


    function generParams()
    {
        return [
            'pageId'    => $this->pageId,
            'pageSize'  => $this->pageSize,
            'type'      => $this->type,
            'channelID' => $this->channelId
        ];
    }

    /**
     * @inheritDoc
     */
    function check()
    {
        if (!isset($this->pageId)) {
            throw  new InvalidArgumentException("pageId is required!");
        }
    }
}