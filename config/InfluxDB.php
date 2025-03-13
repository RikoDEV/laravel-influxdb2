<?php

return [

    /*
    |--------------------------------------------------------------------------
    | InfluxDB Host
    |--------------------------------------------------------------------------
    |
    | This value determines the host address of your InfluxDB instance.
    | It defaults to 'localhost' if not set in your environment file.
    |
    */

    'host' => env('INFLUXDB_HOST', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | InfluxDB Port
    |--------------------------------------------------------------------------
    |
    | This value determines the port used to connect to InfluxDB.
    | The default port is 8086 if not specified.
    |
    */

    'port' => env('INFLUXDB_PORT', 8086),

    /*
    |--------------------------------------------------------------------------
    | InfluxDB Token
    |--------------------------------------------------------------------------
    |
    | The authentication token required to access your InfluxDB instance.
    | Ensure this is securely stored and not hardcoded in your codebase.
    |
    */

    'token' => env('INFLUXDB_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | InfluxDB Bucket
    |--------------------------------------------------------------------------
    |
    | The name of the bucket where your time-series data is stored.
    | This must be configured according to your InfluxDB setup.
    |
    */

    'bucket' => env('INFLUXDB_BUCKET', ''),

    /*
    |--------------------------------------------------------------------------
    | InfluxDB Organization
    |--------------------------------------------------------------------------
    |
    | The organization associated with your InfluxDB instance.
    | This is typically required to properly query and write data.
    |
    */

    'org' => env('INFLUXDB_ORG', ''),

];