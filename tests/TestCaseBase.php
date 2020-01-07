<?php

namespace Tests;

use MaxZhang\DataokeSdk\DefaultDataokeClient;
use PHPUnit\Framework\TestCase;

class TestCaseBase extends TestCase
{
    protected $config;
    protected $client;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->config = include "config.php";
        $this->client = new DefaultDataokeClient($this->config['appKey'], $this->config['appSecret']);
    }
}
