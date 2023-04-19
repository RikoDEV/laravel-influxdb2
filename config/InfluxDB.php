<?php

return [
    'host' => env('INFLUXDB_HOST', 'localhost'),
    'port' => env('INFLUXDB_PORT', 8086),
    'token' => env('INFLUXDB_TOKEN', ''),
    'bucket' => env('INFLUXDB_BUCKET', ''),
    'org' => env('INFLUXDB_ORG', '')
];
