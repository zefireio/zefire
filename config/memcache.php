<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Memcache configuration
    |--------------------------------------------------------------------------
    |
    | Here you may specify memcache's configuration.
    |
    */

    'servers' => getenv('MEMCACHE_SERVERS', '127.0.0.1:11211'),
    'options' => [
    //     'binary_protocol'       => true,
    //     'tcp_no_delay'          => true,
    //     'no_block'              => false,
    //     'connect_timeout'       => 2000, // ms
    //     'poll_timeout'          => 2000, // ms
    //     'recv_timeout'          => 750 * 1000, // us
    //     'send_timeout'          => 750 * 1000, // us
    //     'failover'              => true,
    //     'libketama_compatible'  => true,
    //     'retry_timeout'         => 2,
    //     'server_failure_limit'  => 1,
    //     'auto_eject_hosts'      => true
    ],
    'auth'                      => [
    //     'username' => getenv('MEMCACHE_USERNAME'),
    //     'password' => getenv('MEMCACHE_PASSWORD')
    ]
];