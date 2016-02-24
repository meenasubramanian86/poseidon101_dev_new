<?php

namespace Library\Service;

use Zend\Cache\Storage\Adapter\AbstractAdapter;

/**
*   Memcached implementation of CacheServiceInterface.
*   Uses the memcached configuration from application.config.php
*/

class MemcachedCacheService implements CacheServiceInterface
{
    protected $cacheAdapter;

    public function __construct(AbstractAdapter $cacheAdapter)
    {
        $this->cacheAdapter = $cacheAdapter;
    }

    public function getItem($key)
    {
        return $this->cacheAdapter->getItem($key);
    }

    public function setItem($key, $value)
    {
        return $this->cacheAdapter->setItem($key, $value);
    }
}
