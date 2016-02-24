<?php

namespace Library\Service;

/**
*   Cache wrapper service which provides get/set cache APIs.
*   This interface hides the underlaying cache implementation (could be memcached, redis, etc).
*/

interface CacheServiceInterface
{
    /**
    *   Returns value from the cache for the given key. If value is not available,
    *   it returns null. If the cache server is not available, returns null.
    *
    *   @param string cache key
    *   @return cache value
    */
    public function getItem($key);

    /**
    *   Sets value into the cache for the given key. 
    *   If the cache server is not available, returns null.
    *
    *   @param string cache key
    *   @param object cache value (could be anything from simple string to complex object)
    */
    public function setItem($key, $value);
}
