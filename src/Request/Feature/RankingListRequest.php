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

class RankingListRequest extends DataokeRequest
{
    protected $apiMethodName = "api/goods/get-ranking-list";
    public $version = "v1.0.2";
    /**
     * @var int 榜单类型   1.实时榜 2.全天榜 3.热推榜（热推榜分类无效）4.复购榜
     */
    public $rankType;
    /**
     * @var int 大淘客一级类目id
     */
    public $cid;

    function generParams()
    {
        return array('version' => $this->version, 'rankType' => $this->rankType, 'cid' => $this->cid);
    }

    function check()
    {
        if (empty($this->rankType)) {
            throw new InvalidArgumentException("rankType must be required!");
        }
    }
}