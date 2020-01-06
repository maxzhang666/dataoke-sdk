<?php


namespace MaxZhang\DataokeSdk\Request\Base;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 淘宝客链接转换
 * Class CouponConvertRequest
 * @package MaxZhang\DataokeSdk\Request\Base
 */
class CouponConvertRequest extends DataokeRequest
{

    protected $apiMethodName = "api/goods/get-ranking-list";
    protected $version = "v1.1.1";

    /**
     * 券ID
     * @var string 商品的优惠券ID，一个商品在联盟可能有多个优惠券，可通过填写该参数的方式选择使用的优惠券，请确认优惠券ID正确，否则无法正常跳转
     */
    public $couponId;
    /**
     * 推广位ID
     * @var string 用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid
     */
    public $pid;
    /**
     * 渠道id
     * @var string 用于代理体系，渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认从私域管理系统中提取的渠道id是否正确
     */
    public $channelId;
    /**
     * 付定返红包
     * @var int 0.不使用付定返红包，1.参与付定返红包，付定返红包相关规则：http://www.dataoke.com/info/?id=269
     */
    public $rebateType;

    function generParams()
    {
        return [
            'couponId'   => $this->couponId,
            'pid'        => $this->pid,
            'channelId'  => $this->channelId,
            'rebateType' => $this->rebateType
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    function check()
    {
        if (empty($this->couponId)) {
            throw new InvalidArgumentException("couponId must be required!");
        }
    }
}