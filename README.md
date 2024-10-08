# Laravel Taggable File Cache ![Build Status](https://github.com/FojleRabbiRabib/laravel-tagged-file-cache/actions/workflows/laravel.yml/badge.svg?branch=master)

This package provides a custom file [cache driver](https://laravel.com/docs/11.x/cache#adding-custom-cache-drivers) that supports [Cache Tags](https://laravel.com/api/11.x/Illuminate/Support/Facades/Cache.html#method_tags) for Laravel 11.x

## Usage

This product is publicly available under the terms of the MIT license included in this repository.

## Installation and Requirements

First, you'll need to require the package with Composer:

```
composer require FojleRabbiRabib/laravel-tagged-file-cache
```

Then, update `config/app.php` by adding an entry for the service provider.

```
'providers' => [
    // ...
    FojleRabbiRabib\Cache\TaggableFileCacheServiceProvider::class
];
```

Finally, add the necessary config to `config\cache.php`.

```
'default' => env('CACHE_DRIVER', 'file'),

'stores' => [

		'file' => [
			'driver' => 'file',
			'path'   => storage_path('framework/cache')
		],
		// ...
],
```

You are ready to use tag file caching..

```
$minutes = 1111 * 4;
$tags = ['people', 'cars', 'shamans'];
Cache::tags($tags)->put('name', 'John', $minutes);

$name = Cache::tags($tags)->get('name');
var_dump($name); // Output: John

// If you want to delete tags
Cache::tags($tags)->flush();
```

## Optional Configuration

There are some optional config options available in the store definition above:

`separator` : defines the separator character or sequence to be used internally, this should be chosen to **never** collide with a key value. defaults to `---` if omitted.
