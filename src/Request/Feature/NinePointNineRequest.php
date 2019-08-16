<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 14:24:46
 * @LastEditTime: 2019-08-16 10:31:04
 */
namespace MaxZhang\DataokeSdk\Request\Feature;

use MaxZhang\DataokeSdk\DataokeRequest;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;

 /**
  * 9.9精选  
  */
 class NinePointNineRequest extends DataokeRequest{
     protected $apiMethodName="api/goods/nine/op-goods-list";    
     
     /**
      *@var string API接口版本号
      */
     public $version='v1.0.2';
     /**
      *@var int 每页条数 默认100 ，可选范围：10,50,100,200，如果小于10按10处理，大于200按照200处理，其它非范围内数字按100处理
      */
     public $pageSize=100;
     /**
      *@var string 分页id		默认为1，支持传统的页码分页方式和scroll_id分页方式，根据用户自身需求传入值。示例1：商品入库，则首次传入1，后续传入接口返回的pageid，接口将持续返回符合条件的完整商品列表，该方式可以避免入口商品重复；示例2：根据pagesize和totalNum计算出总页数，按照需求返回指定页的商品（该方式可能在临近页取到重复商品）
      */
     public $pageId='1';
     /**
      *@var string 精选类目Id	9.9精选的类目id，分类id请求详情：-1 -精选，1 -居家百货，2 -美食，3 -服饰，4 -配饰，5 -美妆，6 -内衣，7 -母婴，8 -箱包，9 -数码配件，10 -文娱车品
      */
     public $nineCid=-1;


     public function generParams()
     {
         return array('version' =>$this->version ,'pageId'=>$this->pageId ,'nineCid'=>$this->nineCid);
     }

     function check()
     {
         if (empty($this->pageId)) {
             throw new InvalidArgumentException("pageId must be required!");
         }
         if (empty($this->pageSize)) {
             throw new InvalidArgumentException("pageSize must be required!");
         }
     }
 }


?>