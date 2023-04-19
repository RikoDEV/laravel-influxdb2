<?php

namespace RikoDEV\InfluxDB\Facades;

use Illuminate\Support\Facades\Facade;
use InfluxDB2\Client;

class InfluxDB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}