<?php

namespace RikoDEV\InfluxDB\Facades;

use Illuminate\Support\Facades\Facade;

class InfluxDB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'influxdb';
    }
}