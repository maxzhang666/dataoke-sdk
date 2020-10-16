<?php

namespace Tests\Base;


use MaxZhang\DataokeSdk\Request\Base\CouponConvertRequest;
use MaxZhang\DataokeSdk\Request\Base\TwdToTwdRequest;
use Tests\TestCaseBase;

class TwdToTwdTest extends TestCaseBase
{
    /**
     * @throws \MaxZhang\DataokeSdk\Exceptions\HttpException
     * @throws \MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException
     */
    public function TwdToTwd()
    {
        $req = new TwdToTwdRequest();
        $req->setContent('淘口令');


        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(true);
    }

}
