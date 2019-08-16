<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 10:11:40
 * @LastEditTime: 2019-08-16 09:52:54
 */
declare(strict_types=1);
namespace MaxZhang\DataokeSdk;

use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;


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
    public function __construct(string $serverUrl = "https://openapi.dataoke.com", string $appKey = null, string $appSecret = null)
    {        
        $this->serverUrl = $serverUrl;
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;        
    }

    public function execute(DataokeRequest $request){
        //参数检查
        if(empty($this->appKey)){
            throw new InvalidArgumentException("appKey can not empty ！");
        }
        if(empty($this->serverUrl)){
            throw new InvalidArgumentException("serverUrl can not empty ！");
        }
        if(empty($this->appSecret)){
            throw new InvalidArgumentException("appSecret can not empty ！");
        }
        $request->check();
        $paramsArray=$request->getApiParams();
        if (empty($paramsArray)) {
            $paramsArray="";
        }
        $paramsArray['appKey']=$this->appKey;
        $paramsArray=$this->signSendData($paramsArray);
        
        try{
            $resp=self::curl($this->serverUrl.'/'.$request->getApiMethodName().'?'.http_build_query($paramsArray));
            return $resp;
        }catch(\Exception $e)
        {
            throw  new HttpException($e->getMessage(),$e->getCode());
        }

    }

    /**
     * 发送请求
     *
     * @param string $url
     * @param json|xml $postFields
     * $param array $header
     *
     * @return json xml
     */
    public static function curl($url, $postFields = null, $header = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // curl_setopt($ch, CURLOPT_TIMEOUT, self::$readTimeout);
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        // https 请求
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new HttpException(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new HttpException('Dataoke API Network Error！httpStatusCode' . $response, $httpStatusCode);
            }
        }
        curl_close($ch);

        return $response;
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
