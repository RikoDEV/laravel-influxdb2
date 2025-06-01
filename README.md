![influx-laravel](https://github.com/RikoDEV/laravel-influxdb2/assets/18230443/8d9eb202-9050-4b76-878b-79b863629f48)

# Laravel InfluxDB 2

A Laravel package to integrate [InfluxDB 2.0](https://www.influxdata.com/) using the official [influxdb-client-php](https://github.com/influxdata/influxdb-client-php) library.

## 📦 Installation

### 1. **Install with Composer:**
```sh
composer require rikodev/laravel-influxdb2
```

### 2. **Register Service Provider (if needed):**

> **Note:** Laravel 5.5+ supports automatic package discovery. You can skip this step.

For older versions, add the provider and alias to your `config/app.php`:

```php
'providers' => [
    RikoDEV\InfluxDB\Providers\ServiceProvider::class,
],

'aliases' => [
    'InfluxDB' => RikoDEV\InfluxDB\Facades\InfluxDB::class,
],
```

### 3. **Environment Configuration:**

Add the following environment variables to your `.env` file:

```ini
INFLUXDB_HOST=localhost
INFLUXDB_PORT=8086
INFLUXDB_TOKEN=
INFLUXDB_BUCKET=
INFLUXDB_ORG=
```

### 4. **Publish Configuration:**

Run the following command to publish the configuration file:

```sh
php artisan vendor:publish --provider="RikoDEV\InfluxDB\Providers\ServiceProvider"
```

---

## 📖 Usage

### 🔍 Reading Data

```php
use RikoDEV\InfluxDB\Facades\InfluxDB;

// Get the query client
$queryApi = InfluxDB::createQueryApi();

// Query data
$result = $queryApi->queryRaw(
    "from(bucket: \"my-bucket\")
    |> range(start: 0)
    |> filter(fn: (r) => r[\"_measurement\"] == \"weather\"
                         and r[\"_field\"] == \"temperature\"
                         and r[\"location\"] == \"Sydney\")"
);

InfluxDB::close();
```

### ✏️ Writing Data

```php
use RikoDEV\InfluxDB\Facades\InfluxDB;
use InfluxDB2\Point;

// Get the write client
$writeApi = InfluxDB::createWriteApi();

// Create an array of points and write them to InfluxDB
$result = $writeApi->write([
    Point::measurement("blog_posts")
         ->addTag("post_id", $post->id)
         ->addField("likes", 6)
         ->addField("comments", 3)
         ->time(time())
]);

InfluxDB::close();
```

---

## 📜 License

This project is licensed under the [MIT License](LICENSE).
Based on the [tray-labs/laravel-influxdb](https://github.com/tray-labs/laravel-influxdb) project.

---

Feel free to open an issue or submit a PR if you’d like to improve the project!

🚀 Happy coding!
