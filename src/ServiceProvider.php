<?php
/*
 * @Author: MaxZhang
 * @Date: 2019-08-15 11:30:45
 * @LastEditTime: 2019-08-15 11:30:45
 */

namespace MaxZhang\DataokeSdk;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    protected $defer = true;

    public function register()
    {
        $this->app->singleton(DefaultDataokeClient::class, function () {
            return new DefaultDataokeClient(
                config('services.dataokeSdk.serverUrl'),
                config('services.dataokeSdk.appKey'),
                config('services.dataokeSdk.appSecret')                
            );
        });

        $this->app->alias(DefaultDataokeClient::class, 'dataokeSdk');
    }

    public function provides()
    {
        return [DefaultDataokeClient::class, 'dataokeSdk'];
    }
}