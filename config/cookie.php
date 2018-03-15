<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Cookie name
    |--------------------------------------------------------------------------
    |
    | This value defines the cookie name for your application.
    */

	'name' => 'zefire',

	/*
    |--------------------------------------------------------------------------
    | Default ttl
    |--------------------------------------------------------------------------
    |
    | This value defines the life of a cookie before it expires.
	|
	|	default: 7200 (2h)
	|
    */

	'default_ttl' => 7200,
	
	/*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | This value defines the path from which the cookie will be considered as
    | available. Usually set to the root path.
    |
	|	default: /
	|
    */

	'path' => '/',
	
	/*
    |--------------------------------------------------------------------------
    | Secure
    |--------------------------------------------------------------------------
    |
    | This value makes sure the cookie is sent to the browser using a secure
    | connection (HTTPS).
    |
	|	default: false
	|
    */

	'secure' => false,

	/*
    |--------------------------------------------------------------------------
    | Http only
    |--------------------------------------------------------------------------
    |
    | This value will make sure the cookie is only available through HTTP
    | connections. It will not be accessbile to JavaScript.
    |
	|	default: true
	|
    */

	'http_only' => true,

	/*
    |--------------------------------------------------------------------------
    | Same site
    |--------------------------------------------------------------------------
    |
    | This value will prevent the browser from sending the cookie along with
    | cross-site requests. It can be strict or lax.
    |
	|	default: strict
	|
    */

	'same_site' => 'strict' // lax or strict
];