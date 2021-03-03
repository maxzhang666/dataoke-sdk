<?php


namespace MaxZhang\DataokeSdk\Request\Feature;


use MaxZhang\DataokeSdk\DataokeRequest;

class ListDiscountBrand extends DataokeRequest
{

    protected $version = 'v1.0.0';
    protected $apiMethodName = 'list-discount-brand';

    /**
     * @var int 页码（默认为1）
     */
    public $pageId = 1;
    /**
     * @var int 每页记录条数（默认20）
     */
    public $pageSize = 20;

    function generParams()
    {
        return [
            'pageId'   => $this->pageId,
            'pageSize' => $this->pageSize
        ];
    }

    function check()
    {
        return true;
    }
}