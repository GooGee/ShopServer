<?php

namespace App\Providers;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class ElasticsearchServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            $uri = config('database.es');
            $ui = parse_url($uri);
            $client = ClientBuilder::create()
                ->setHosts([$ui['scheme'] . '://' . $ui['host'] . ':' . $ui['port']])
                ->setBasicAuthentication($ui['user'], $ui['pass'])
                ->build();
            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
