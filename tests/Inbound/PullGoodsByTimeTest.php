<?php


namespace Tests\Inbound;


use MaxZhang\DataokeSdk\Exceptions\HttpException;
use MaxZhang\DataokeSdk\Exceptions\InvalidArgumentException;
use MaxZhang\DataokeSdk\Request\Feature\RankingListRequest;
use MaxZhang\DataokeSdk\Request\Inbound\PullGoodsByTimeRequest;
use Tests\TestCaseBase;

class PullGoodsByTimeTest extends TestCaseBase
{
    /**
     * @test
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getGoods()
    {
        $req         = new PullGoodsByTimeRequest();
        $req->pageId = 1;
        $res         = $this->client->execute($req);
        var_dump($res);
        $flag        = $res['code'] == 0;
        print_r($res);

        self::assertIsBool($flag);
    }
}