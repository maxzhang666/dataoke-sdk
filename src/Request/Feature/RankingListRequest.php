<?php
/**
 * User: MaxZhang
 * Email:q373884384@gmail.com
 * Date: 2019/8/15 0015
 * Time: 22:42
 */

namespace MaxZhang\DataokeSdk\Request\Feature;



use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 各大榜单
 * Class RankingListRequest
 * @package MaxZhang\DataokeSdk\Request\Feature
 */
class RankingListRequest extends DataokeRequest
{
    protected $apiMethodName = "api/goods/get-ranking-list";
    public $version = "v1.1.2";
    /**
     * @var int 榜单类型   1.实时榜 2.全天榜 3.热推榜 4.复购榜 5.热词飙升榜 6.热词排行榜 7.综合热搜榜
     */
    public $rankType;
    /**
     * @var int 大淘客一级类目id
     */
    public $cid;

    /**
     * @return int
     */
    public function getRankType(): int
    {
        return $this->rankType;
    }

    /**
     * @param int $rankType
     */
    public function setRankType(int $rankType): void
    {
        $this->rankType = $rankType;
    }


    function generParams()
    {
        return array('version' => $this->version, 'rankType' => $this->rankType, 'cid' => $this->cid);
    }

    /**
     * @throws InvalidArgumentException
     */
    function check()
    {
        if (empty($this->rankType)) {
            throw new InvalidArgumentException("rankType must be required!");
        }
    }
}