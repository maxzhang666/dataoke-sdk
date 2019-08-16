<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 09:51:45
 * @LastEditTime: 2019-08-16 09:48:09
 */
namespace MaxZhang\DataokeSdk;

abstract class DataokeRequest
{
    protected $apiParams = array();
    protected $apiMethodName;    

    abstract function generParams();

    abstract function check();

    /**
     * 获取请求数据
     */
    public function getApiParams(){
        $this->apiParams=$this->generParams();
        return $this->apiParams;
    }
    

    /**
     * 获取接口方法名称
     */
    public function getApiMethodName(){
        return $this->apiMethodName;
    }
}
