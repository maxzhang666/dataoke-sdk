<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 16:51:13
 * @LastEditTime: 2019-08-15 17:37:12
 */
namespace MaxZhang\DataokeSdk\Request;

use MaxZhang\DataokeSdk\DataokeRequest;
/**
 * 超级搜索
 */
class SuperSearchRequest extends DataokeRequest{
    protected $apiMethodName="api/goods/list-super-goods";
    
    /**
     * API接口版本号	是	String	当前版本： v1.0.1
     */
    public $version="v1.0.1";
    /**
     * 搜索类型	是	Number	0-综合结果，1-大淘客商品，2-联盟商品
     */
    public $type;
    /**
     * 关键词搜索	是	String	
     */
    public $keywords;
    /**
     * 是否天猫商品	否	Number	1-天猫商品，0-所有商品，不填默认为0
     */
    public $tmall;
    /**
     * 是否海淘商品	否	Number	1-海淘商品，0-所有商品，不填默认为0
     */
    public $haitao;
    /**
     * 排序字段	否	String	排序字段信息 销量（total_sales） 价格（price），排序_des（降序），排序_asc（升序）
     */
    public $sort;

    
    public function generParams()
    {
        return array(
            "version"=>	$this->version,
            "keyWords"=>$this->keywords,
            "tmall"=>$this->tmall,
            "haitao"=>$this->haitao,
            "sort"=>$this->sort,
            "type"=>$this->type
        );
    }
}