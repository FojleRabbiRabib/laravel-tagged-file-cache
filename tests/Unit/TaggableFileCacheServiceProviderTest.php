<?php
namespace Tests\Unit;

use FojleRabbiRabib\Cache\TaggableFileStore;
use Tests\BaseTest;

class TaggableFileCacheServiceProviderTest extends BaseTest
{
	public function testCacheIsTaggableFileCacheWhenUsing()
	{
		$this->assertInstanceOf(TaggableFileStore::class, app('cache')->store()->getStore());
	}
}
