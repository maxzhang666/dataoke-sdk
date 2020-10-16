<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 15:32:45
 * @LastEditTime: 2019-08-15 15:36:44
 */

namespace MaxZhang\DataokeSdk\Request\Inbound;

use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

class GoodsDetailRequest extends DataokeRequest
{

    protected $apiMethodName = "api/goods/get-goods-details";
    public $version = "v1.2.3";
    /**
     * id    大淘客的商品id        Number
     */
    public $id;
    /**
     *  淘宝商品id，id或goodsId必填其中一个，若均填写，将优先查找当前单品id
     */
    public $goodsId;

    public function generParams()
    {
        return array("version" => $this->version,
                     "id"      => $this->id,
                     'goodsId' => $this->goodsId);
    }

    function check()
    {
        if (empty($this->id) && empty($this->goodsId)) {
            throw new InvalidArgumentException('goods id or id must required');
        }
    }
}