<?php

namespace Tests\Base;


use MaxZhang\DataokeSdk\Request\Base\CouponConvertRequest;
use Tests\TestCaseBase;

class CouponConvertTest extends TestCaseBase
{
    /**
     * @test
     * @throws \MaxZhang\DataokeSdk\Exceptions\HttpException
     * @throws \MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException
     */
    public function convert()
    {
        $req           = new CouponConvertRequest();

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(true);
    }

}
