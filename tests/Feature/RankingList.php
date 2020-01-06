<?php

namespace Tests\Feature;


use MaxZhang\DataokeSdk\Request\Feature\RankingListRequest;


use Tests\TestCaseBase;

class RankingList extends TestCaseBase
{

    /**
     * @test
     * @throws \MaxZhang\DataokeSdk\Exceptions\HttpException
     * @throws \MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException
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