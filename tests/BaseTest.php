<?php
namespace Tests;

use FojleRabbiRabib\Cache\TaggableFileCacheServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class BaseTest extends TestCase
{
	protected function tearDown(): void
	{
		\Mockery::close();
		parent::tearDown();
	}

	/**
	 * Get package providers.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 * @return array
	 */
	protected function getPackageProviders($app): array
	{
		return [TaggableFileCacheServiceProvider::class];
	}

	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app): void
	{
		// Set application key
		$app['config']->set('app.key', 'base64:tQbgKF5NH5zMyGh4vCNypFAzx9trCkE6x');

		// Set cache configuration to file
		$app['config']->set('cache.default', 'file');
		$app['config']->set('cache.stores.file', [
			'driver' => 'file',
			'path' => storage_path('framework/cache'),
			'separator' => '~#~',
		]);
	}
}
