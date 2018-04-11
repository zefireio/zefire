<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Queues
    |--------------------------------------------------------------------------
    |
    | Here you may specify the queue system's configuration. Zefire supports 3 
    | adapters listed below out of the box.
    |
    | Handlers:
    |
    | Zefire\Queue\PheanstalkHandler::class      // Default
    | Zefire\Queue\RedisHandler::class
    | Zefire\Queue\DatabaseHandler::class
    |
    */

    'driver'        => Zefire\Queue\PheanstalkHandler::class,
    'tries'         => 3,
    'connection'    => 'mysql1',
    'beanstalk'     => '127.0.0.1:11300',
    'wait'          => 3,
];