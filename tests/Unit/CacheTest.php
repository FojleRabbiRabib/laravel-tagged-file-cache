<?php
namespace Tests\Unit;

use Illuminate\Support\Facades\Cache;
use Tests\BaseTest;

class CacheTest extends BaseTest
{
	public function testCache()
	{
		$tags = ['phpunit', 'phpunit_second_tag'];

		$now = date('Ymdhis');
		$unique = uniqid();

		$key = 'phpunit-' . $now;

		Cache::tags($tags)->put($key, $now, 10);

		$some = Cache::tags($tags)->get($key);

		$this->assertEquals($now, $some);
		/*
		Cache::tags($tags)->flush();
		$some = Cache::tags($tags)->get($key);

		Cache::tags('phpunit_second_tag')->put($unique, $unique, 10);
		$some = Cache::tags('phpunit_second_tag')->get($unique);
		$this->assertEquals($unique, $some);

		Cache::tags('phpunit_second_tag')->flush();
		$some = Cache::tags($tags)->get($unique);
		$this->assertEquals(null, $some);
   */
	}
}
