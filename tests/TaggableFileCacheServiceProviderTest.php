<?php

use FojleRabbiRabib\Cache\TaggableFileStore;

class TaggableFileCacheServiceProviderTest extends BaseTest
{
	public function testCacheIsTaggableFileCacheWhenUsing(){

		$this->assertInstanceOf(TaggableFileStore::class, app('cache')->store()->getStore());
	}

}