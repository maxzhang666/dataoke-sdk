<?php


namespace MaxZhang\DataokeSdk\Request\Base;


use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

/**
 * 淘口令转淘口令
 * Class TwdToTwdRequest
 * @package MaxZhang\DataokeSdk\Request\Base
 */
class TwdToTwdRequest extends DataokeRequest
{

    protected $apiMethodName = "api/tb-service/twd-to-twd";
    protected $version = "v1.0.0";

    /**
     * 支持包含文本的淘口令，但最好是一个单独淘口令
     * 是
     * @var string
     */
    public $content;
    /**
     * 推广位ID，用户可自由填写当前大淘客账号下已授权淘宝账号的任一pid，若未填写，则默认使用创建应用时绑定的pid
     * 否
     * @var string
     */
    public $pid;
    /**
     * 渠道id将会和传入的pid进行验证，验证通过将正常转链，请确认填入的渠道id是正确的
     * 否
     * @var string
     */
    public $channelId;
    /**
     * 会员运营ID
     * 否
     * @var string
     */
    public $special_id;
    /**
     * 淘宝客外部用户标记，如自身系统账户ID；微信ID等
     * 否
     * @var string
     */
    public $external_id;


    function generParams()
    {
        return [
            'content'     => $this->content,
            'pid'         => $this->pid,
            'channelId'   => $this->channelId,
            'special_id'  => $this->special_id,
            'external_id' => $this->external_id
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    function check()
    {
        if (empty($this->content)) {
            throw  new InvalidArgumentException("goodsId must be required!");
        }
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
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
     * @return string
     */
    public function getSpecialId(): string
    {
        return $this->special_id;
    }

    /**
     * @param string $special_id
     */
    public function setSpecialId(string $special_id): void
    {
        $this->special_id = $special_id;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->external_id;
    }

    /**
     * @param string $external_id
     */
    public function setExternalId(string $external_id): void
    {
        $this->external_id = $external_id;
    }




}