<?php

namespace SellerLegend;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use SellerLegend\Http\Client;

class SellerLegendServiceProvider extends ServiceProvider
{
    /**
     * The package version.
     *
     * @var string
     */
    const VERSION = '1.0';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath($raw = __DIR__.'/../config/sellerlegend.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('sellerlegend.php')], 'sellerlegend');
        }

        $this->mergeConfigFrom($source, 'sellerlegend');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sellerlegend.config', function ($app) {
            return $this->app['config']['sellerlegend'];
        });

        $this->app->singleton(Client::class, function ($app) {
            $config = $app['sellerlegend.config'];
            return new Client($config);
        });
    }

    public function provides()
    {
        return [
            Client::class
        ];
    }
}
