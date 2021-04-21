<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 应用场景：可用于app、自动发单、社群等场景，提前透出商品优惠信息，便于拉新促活，提高转化，锁佣快人一步
 * 接口说明：该接口返回全网（京东，淘宝，天猫）最全的商品优惠信息（半价，秒杀,超值买返…）拉新促活好帮手
 * Class ListTipOffRequest
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class ListTipOffRequest extends DataokeRequest
{

    protected $version = 'v2.0.0';
    protected $apiMethodName = 'api/dels/spider/list-tip-off';

    /**
     * @var int 线报类型：1-超值买返2-天猫超市3-整点抢购4-最新线报-所有数据(默认)5-最新线报-天猫6-最新线报-京东7-最新线报-拼多多
     */
    private $topic;
    /**
     * @var int rush-整点抢购时的时间戳（秒），示例：1617026400
     */
    private $selectTime;
    /**
     * @var int 每页记录数，默认20
     */
    private $pageId;
    /**
     * @var int 页码，默认为1
     */
    private $pageSize;

    function generParams()
    {
        return [
            'topic'      => $this->topic,
            'selectTime' => $this->selectTime,
            'pageId'     => $this->pageId,
            'pageSize'   => $this->pageSize
        ];
    }

    function check()
    {
        return true;
    }

    /**
     * @return int
     */
    public function getTopic(): int
    {
        return $this->topic;
    }

    /**
     * @param int $topic
     */
    public function setTopic(int $topic): void
    {
        $this->topic = $topic;
    }

    /**
     * @return int
     */
    public function getSelectTime(): int
    {
        return $this->selectTime;
    }

    /**
     * @param int $selectTime
     */
    public function setSelectTime(int $selectTime): void
    {
        $this->selectTime = $selectTime;
    }

    /**
     * @return int
     */
    public function getPageId(): int
    {
        return $this->pageId;
    }

    /**
     * @param int $pageId
     */
    public function setPageId(int $pageId): void
    {
        $this->pageId = $pageId;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }


}