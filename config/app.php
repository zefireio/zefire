<?php

return [
	
	/*
    |--------------------------------------------------------------------------
    | Application Nname, description and version 
    |--------------------------------------------------------------------------
    |
    | These values can be used throughout your application.
    */

	'name'         => 'Zefire',

	'description'  => 'Framework',

	/*
    |--------------------------------------------------------------------------
    | Host name
    |--------------------------------------------------------------------------
    |
    | This value is used for cookies in your application.
    */

	'host' => getenv('HOST', 'localhost'),

	/*
    |--------------------------------------------------------------------------
    | Environment
    |--------------------------------------------------------------------------
    |
    | This value in your application for environment specific tasks.
    */

	'env' => getenv('ENV', 'local'),

	/*
    |--------------------------------------------------------------------------
    | Debug flag
    |--------------------------------------------------------------------------
    |
    | This value will output error details in order to ease debugging.
    */

	'debug'	=> getenv('DEBUG', true),

	/*
    |--------------------------------------------------------------------------
    | Default language
    |--------------------------------------------------------------------------
    |
    | This value will set the default fallback language.
    |
	|	default: en (English)
	|
    */

	'default_lang' => 'en',

	/*
    |--------------------------------------------------------------------------
    | Exception handler
    |--------------------------------------------------------------------------
    |
    | These values will set the the various error handlers. The default values
    | can be changed to suit any custom error handling.
    */

	'exception_handler' => 'App\Exceptions\Handler::handleException',
	'error_handler' 	=> 'App\Exceptions\Handler::handleError',
	'shutdown_handler' 	=> 'App\Exceptions\Handler::handleShutdown',

	/*
    |--------------------------------------------------------------------------
    | Encryption settings
    |--------------------------------------------------------------------------
    |
    | These values will define the level of encryption of your application.
    | "AES-128-CBC" and "AES-256-CBC" only are valid cyphers.
    |
	|	default: AES-256-CBC (256bits)
	|
    */	

	'encryption_key' 	=> getenv('KEY', 'secret'),
	'cipher'			=> 'AES-256-CBC'	
];