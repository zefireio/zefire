<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Expiry
    |--------------------------------------------------------------------------
    |
    | This value defines the max ttl for templates before they expire.
    */

	'max_life' => 7200,

	/*
    |--------------------------------------------------------------------------
    | Force compile
    |--------------------------------------------------------------------------
    |
    | This value defines whether templates should be compiled on each request
    | when set to true. This will be useful for debugging purposes.
    |
	|	default: false
	|
    */

	'force_compile' => getenv('FORCE_COMPILE', true),
];