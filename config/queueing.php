<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Queues
    |--------------------------------------------------------------------------
    |
    | Here you may specify the queue system's configuration. Zefire only comes
    | with a Beanstalk adapter for the time being.
    |
    */

	'driver'       => 'beanstalk',
	'tries'        => 3,
	'beanstalk'    => '127.0.0.1'
];