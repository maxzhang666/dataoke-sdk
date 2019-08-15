<?
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 09:51:45
 * @LastEditTime: 2019-08-15 11:29:49
 */
namespace MaxZhang\DataokeSdk;

abstract class DataokeRequest
{
    protected $apiParams = array();
    protected $apiMethodName;    

    /**
     * 获取请求数据
     */
    public function getApiParams(){
        return $this->apiParams;
    }
    

    /**
     * 获取接口方法名称
     */
    public function getApiMethodName(){
        return $this->apiMethodName;
    }
}
