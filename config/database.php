<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Default connection
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default database connection. If not connection
    | is defined in your application's models, then it will default to the
    | connection defined below.
    |
    */

	'default' => 'mysql1',

	/*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here you may specify database connections in order to use database
    | with your application. Zefire only comes with a MySQL Adapter for the
    | time being.
    |
    */

	'mysql1' => [
		'type' 	=> 'mysql',
        'adapter'   => \Zefire\Database\MysqlAdapter::class,
		'host' 		=> getenv('DB_HOST', null),
		'port' 		=> getenv('DB_PORT', null),
		'username' 	=> getenv('DB_USERNAME', null),
		'password' 	=> getenv('DB_PASSWORD', null),
		'database' 	=> getenv('DB_DATABASE', null),
        'strict'    => false,
	]
];
