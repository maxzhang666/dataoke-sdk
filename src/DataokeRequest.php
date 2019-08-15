<?
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 09:51:45
 * @LastEditTime: 2019-08-15 10:38:42
 */
namespace MaxZhang\DataokeSdk;

abstract class DataokeRequest
{
    protected $apiParams = array();


    public function getCheckParam()
    {
        return $this->checkParam;
    }

    public function setCheckParam(bool $checkParam)
    {
        $this->checkParam = $checkParam;
    }

    public function generatorJsonReq($appParams)
    {
        return null;
    }

    public function generatorXmlReq($appParams)
    {
        return null;
    }

    /**
     * 根据请求方式，生成相应请求报文
     *
     * @param
     *            type 请求方式(json或xml)
     */
    abstract function getApiParams();

    /**
     * 获取接口方法名称
     */
    abstract function getApiMethodName();

    /**
     * 数据校验
     */
    abstract function check();

    abstract function getBizName();

    /**
     * 获取请求报文
     */
    function getReqJson()
    {
        $paramsArray = $this->getApiParams();
        if (empty($paramsArray)) {
            $paramsArray = '';
        }
        $paramsArray = array('sn_request' =>
            array('sn_body' =>
                array(
                    $this->getBizName() => $paramsArray
                )
            )
        );

        return json_encode($paramsArray);
    }
}
