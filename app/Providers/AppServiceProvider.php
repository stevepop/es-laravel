<?php

namespace App\Providers;

use App\Books\ElasticsearchRepository;
use Elasticsearch\Client;
use App\Books\BooksRepository;
use Elasticsearch\ClientBuilder;
use App\Books\EloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
          $this->app->bind(BooksRepository::class, function($app) {
           // Use Eloquent if elasticsearch is switched off
            if (! config('services.search.enabled')) {
                return new EloquentRepository();
            }

            return new ElasticsearchRepository (
                $app->make(Client::class)
            );
          });

          $this->bindSearchClient();
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

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }
}
