# Laravel InfluxDB 2

A service made to provide, set up and use the library from influxdata [influxdb-client-php](https://github.com/influxdata/influxdb-client-php) in Laravel.

## Installing

* Install by composer command:

```json
    "require": {
        ...
        "rikodev/laravel-influxdb2": "dev-master"
    },
    "repositories": [
        {
            "url": "https://github.com/RikoDEV/laravel-influxdb2.git",
            "type": "git"
        }
    ],
```

## Register service provider(pick one of two).

- `Laravel`: in `config/app.php` file, `Laravel 5.5+ supports package discovery automatically, you should skip this step`
    ```php
    'providers' => [
    //  ...
    RikoDEV\InfluxDB\Providers\ServiceProvider::class,
    ]
    ```
    ```php
    'aliases' => [
    //  ...
        'InfluxDB' => RikoDEV\InfluxDB\Facades\InfluxDB::class,
    ]
    ```
- `Lumen`: in `bootstrap/app.php` file
    ```php
    // config
    $app->configure('InfluxDB');
  
    $app->register(RikoDEV\InfluxDB\Providers\LumenServiceProvider::class);
    $app->alias('InfluxDB', RikoDEV\InfluxDB\Facades\InfluxDB::class);
    ```


* Define env variables to connect to InfluxDB

```ini
INFLUXDB_HOST=
INFLUXDB_PORT=
INFLUXDB_TOKEN=
INFLUXDB_BUCKET=
INFLUXDB_ORG=
```

* Write this into your terminal inside your project
  - `Laravel`
    ```ini
    php artisan vendor:publish
    ```
  - `Lumen`
    ```ini
    cp vendor/RikoDEV/lumen-influxdb/config/InfluxDB.php config/InfluxDB.php
    ```

## Reading Data

```php
<?php
use RikoDEV\InfluxDB\Facades\InfluxDB;

// Get query client
$queryApi = InfluxDB::createQueryApi();

// Synchronously executes query and return result as unprocessed String
$result = $queryApi->queryRaw(
    "from(bucket: \"my-bucket\")
                |> range(start: 0)
                |> filter(fn: (r) => r[\"_measurement\"] == \"weather\"
                                 and r[\"_field\"] == \"temperature\"
                                 and r[\"location\"] == \"Sydney\")"
);

InfluxDB::close();
```

## Writing Data

```php
<?php

$writeApi = InfluxDB::createWriteApi();

// create an array of points
$result = $writeApi->write([
    Point::measurement("blog_posts")
      ->addTag("post_id", $post->id)
      ->addField("likes", 6)
      ->addField("comments", 3)
      ->time(time())
]);

InfluxDB::close();
```

License
----
Based on [tray-labs/laravel-influxdb](https://github.com/tray-labs/laravel-influxdb) project.
This project is licensed under the MIT License
