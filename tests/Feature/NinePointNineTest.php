<?php

namespace Tests\Feature;


use MaxZhang\DataokeSdk\Request\Feature\NinePointNineRequest;
use Tests\TestCaseBase;

class NinePointNineTest extends TestCaseBase
{

    /**
     * @test
     * @throws \MaxZhang\DataokeSdk\Exceptions\HttpException
     * @throws \MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException
     */
    public function getList()
    {
        $req = new NinePointNineRequest();

        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(true);

    }
}
