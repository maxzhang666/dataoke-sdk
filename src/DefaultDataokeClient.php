<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 10:11:40
 * @LastEditTime: 2019-08-15 10:30:24
 */
declare(strict_types=1);
namespace MaxZhang\DataokeSdk;
class DefaultDataokeClient{
    private $appKey;
    private $appSecret;
    
    private $serverUrl;

    /**
     * 构造方法.
     *
     * @param string $serverUrl 服务调用地址
     * @param string $appKey 应用访问key
     * @param string $appSecret appKey对应密钥
     * @param string $format 请求、响应格式(xml、json)
     */
    public function __construct(string $serverUrl = "https://openapi.dataoke.com/", string $appKey = null, string $appSecret = null)
    {        
        $this->serverUrl = $serverUrl;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;        
    }

    /**
     * 对发送数据进行签名
     */
    private function signSendData($para){
        $sign=$this->makeSign($para,$this->appSecret);
        $para['sign']=$sign;      
        return $para;
    }

    /**参数加密
    * @param $data
    * @param $appSecret
    * @return string
    */
    private function makeSign($data, $appSecret)
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            $str .= '&' . $k . '=' . $v;
        }
        $str = trim($str, '&');
        $sign = strtoupper(md5($str . '&key=' . $appSecret));
        return $sign;
    }
}
