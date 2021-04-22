<?php


namespace MaxZhang\DataokeSdk\Request\Base;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 高效转链
 * Class GetPrivilegeLinkRequest
 * @package MaxZhang\DataokeSdk\Request\Base
 */
class GetPrivilegeLinkRequest extends DataokeRequest
{

    protected $apiMethodName = "api/tb-service/get-privilege-link";
    protected $version = "v1.3.1";

    /**
     * 淘宝商品id
     * @var            String
     */
    public $goodsId;
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
    /**
     * 会员运营id
     * @var string
     */
    public $specialId;
    /**
     * 淘宝客外部用户标记，如自身系统账户ID；微信ID等
     * @var string
     */
    public $externalId;
    /**
     * 团长与下游渠道合作的特殊标识，用于统计渠道推广效果 （新增入参）
     * @var
     */
    public $xid;

    /**
     * @var string 淘口令左边自定义符号,默认￥ （2021/3/9新增入参）
     */
    public $leftSymbol;

    /**
     * @var  string 淘口令右边自定义符号,默认￥ （2021/3/9新增入参）
     */
    public $rightSymbol;

    function generParams()
    {
        return [
            'goodsId'     => $this->goodsId,
            'couponId'    => $this->couponId,
            'pid'         => $this->pid,
            'channelId'   => $this->channelId,
            'rebateType'  => $this->rebateType,
            'specialId'   => $this->specialId,
            'externalId'  => $this->externalId,
            'xid'         => $this->xid,
            'leftSymbol'  => $this->leftSymbol,
            'rightSymbol' => $this->rightSymbol,
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    function check()
    {
        if (empty($this->goodsId)) {
            throw  new InvalidArgumentException("goodsId must be required!");
        }
    }

    /**
     * @return String
     */
    public function getGoodsId(): string
    {
        return $this->goodsId;
    }

    /**
     * @param String $goodsId
     */
    public function setGoodsId(string $goodsId): void
    {
        $this->goodsId = $goodsId;
    }

    /**
     * @return string
     */
    public function getCouponId(): string
    {
        return $this->couponId;
    }

    /**
     * @param string $couponId
     */
    public function setCouponId(string $couponId): void
    {
        $this->couponId = $couponId;
    }

    /**
     * @return string
     */
    public function getPid(): string
    {
        return $this->pid;
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid): void
    {
        $this->pid = $pid;
    }

    /**
     * @return string
     */
    public function getChannelId(): string
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     */
    public function setChannelId(string $channelId): void
    {
        $this->channelId = $channelId;
    }

    /**
     * @return int
     */
    public function getRebateType(): int
    {
        return $this->rebateType;
    }

    /**
     * @param int $rebateType
     */
    public function setRebateType(int $rebateType): void
    {
        $this->rebateType = $rebateType;
    }


}