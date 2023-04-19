<?php

namespace RikoDEV\InfluxDB\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use InfluxDB2\Client;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/InfluxDB.php' => config_path('influxdb.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function($app) {
            $client = new Client([
                "url" => sprintf("http://%s:%s", config('influxdb.host'), config('influxdb.port')),
                "token" => config('influxdb.token'),
                "bucket" => config('influxdb.bucket'),
                "org" => config('influxdb.org'),
                "precision" => InfluxDB2\Model\WritePrecision::S
            ]);

            return $client;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            InfluxDB::class,
        ];
    }
}
