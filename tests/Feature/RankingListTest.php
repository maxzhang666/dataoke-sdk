<?php

namespace Tests\Feature;


use MaxZhang\DataokeSdk\Exceptions\HttpException;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;
use MaxZhang\DataokeSdk\Request\Feature\RankingListRequest;


use Tests\TestCaseBase;

class RankingListTest extends TestCaseBase
{

    /**
     * @test
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getList()
    {
        $req           = new RankingListRequest();
        $req->rankType = 3;


        $res = $this->client->execute($req);

        print_r($res);

        self::assertIsBool(true);
    }
}
