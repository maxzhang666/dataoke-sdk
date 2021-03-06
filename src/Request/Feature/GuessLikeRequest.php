<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 15:32:45
 * @LastEditTime: 2019-08-15 15:36:44
 */

namespace MaxZhang\DataokeSdk\Request\Feature;

use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

class GuessLikeRequest extends DataokeRequest
{

    protected $apiMethodName = "api/goods/list-similer-goods-by-open";
    public $version = "v1.2.2";
    /**
     * id    大淘客的商品id        Number
     */
    public $id;
    /**
     *  size    每页条数    默认10 ， 最大值100
     */
    public $size;

    public function generParams()
    {
        return array("version" => $this->version, "id" => $this->id, 'size' => $this->size);
    }

    function check()
    {
        if (empty($this->id)) {
            throw new InvalidArgumentException('goods id must required');
        }
    }
}