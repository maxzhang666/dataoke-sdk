<?php
/**
 * User:  MaxZhang
 * Email: q37388438@gmail.com
 * Date: 2019/06/10
 * Time: 18:35
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