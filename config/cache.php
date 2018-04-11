<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Drviver
    |--------------------------------------------------------------------------
    |
    | This value defines which adapter should be used for caching. Default's to
    | "Zefire\Memcache\Memcache" on error or if none specified.
    |
    | Handlers:
    |
    | Zefire\Memcache\Memcache::class      // Default
    | Zefire\Redis\Redis::class
    |
    */

    'driver' => Zefire\Memcache\Memcache::class,
];