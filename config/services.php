<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Autoloaded service on boot
    |--------------------------------------------------------------------------
    |
    | Services below will be automatically loaded on boot by your application.
    | Feel free to add your own services to expand functionalities to
    | your application.
    |
    */

	'services' => [
		'Dumper' 			=> Zefire\Dumper\Dumper::class,
		'Factory' 			=> Zefire\Factory\Factory::class,
		'Log' 				=> Zefire\Log\Log::class,
		'Encryption' 		=> Zefire\Encryption\Encryption::class,
		'Hasher' 			=> Zefire\Hashing\Hasher::class,
		'File' 				=> Zefire\FileSystem\File::class,
		'FileSystem' 		=> Zefire\FileSystem\FileSystem::class,
		'Queue' 			=> Zefire\Queue\Queue::class,
		'Dispatcher' 		=> Zefire\Event\Dispatcher::class,		
		'Session' 			=> Zefire\Session\Session::class,
		'CookieBag' 		=> Zefire\Http\CookieBag::class,
		'HeaderBag' 		=> Zefire\Http\HeaderBag::class,
		'DB' 				=> Zefire\Database\DB::class,
		'Validator' 		=> Zefire\Validation\Validator::class,
		'Command' 			=> Zefire\Routing\Command::class,
		'Route' 			=> Zefire\Routing\Route::class,
		'Router' 			=> Zefire\Routing\Router::class,
		'Redirect' 			=> Zefire\Redirect\Redirect::class,		
		'Cache' 			=> Zefire\Cache\Cache::class,
		'Translate' 		=> Zefire\Translation\Translate::class,
		'View' 				=> Zefire\View\View::class,
		'HttpException' 	=> Zefire\Exception\HttpException::class,
		'Authentication' 	=> Zefire\Authentication\Authentication::class,
	],

	/*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when the application
    | boots. They provide a static interface to call all major services loaded
    | on boot. They will pull them from the container which means it won't affect
    | performance when being used.
    */

	'aliases' => [
		'Dumper' 		=> Zefire\Aliases\Dumper::class,
		'Factory' 		=> Zefire\Aliases\Factory::class,
		'Log' 			=> Zefire\Aliases\Log::class,
		'Encryption' 	=> Zefire\Aliases\Encryption::class,
		'Hasher' 		=> Zefire\Aliases\Hasher::class,
		'File' 			=> Zefire\Aliases\File::class,
		'FileSystem' 	=> Zefire\Aliases\FileSystem::class,
		'Queue' 		=> Zefire\Aliases\Queue::class,
		'Dispatcher' 	=> Zefire\Aliases\Dispatcher::class,		
		'Session' 		=> Zefire\Aliases\Session::class,
		'Cookie' 		=> Zefire\Aliases\Cookie::class,
		'Header' 		=> Zefire\Aliases\Header::class,
		'DB' 			=> Zefire\Aliases\DB::class,
		'Validator' 	=> Zefire\Aliases\Validator::class,
		'Command' 		=> Zefire\Aliases\Command::class,
		'Route' 		=> Zefire\Aliases\Route::class,
		'Router' 		=> Zefire\Aliases\Router::class,
		'Redirect' 		=> Zefire\Aliases\Redirect::class,
		'Cache' 		=> Zefire\Aliases\Cache::class,
		'Translate' 	=> Zefire\Aliases\Translate::class,
		'View' 			=> Zefire\Aliases\View::class,
		'HttpException' => Zefire\Aliases\HttpException::class,
		'Auth' 			=> Zefire\Aliases\Auth::class,
	],

	/*
    |--------------------------------------------------------------------------
    | Middlewares
    |--------------------------------------------------------------------------
    |
    | This array of middleware classes will be automatically used on every
    | request. They are different to route specific middlewares which should be
    | triggered by a route directive.
    */

	'middlewares' => [
		'Cors' 						=> Zefire\Middlewares\Cors::class,
		'VerifyCsrfToken' 			=> App\Middlewares\VerifyCsrfToken::class,
		'PrepareResponseHeaders' 	=> Zefire\Middlewares\PrepareResponseHeaders::class,
		'EncryptCookie' 			=> Zefire\Middlewares\EncryptCookie::class,		
	],

	/*
    |--------------------------------------------------------------------------
    | Unserializable instances
    |--------------------------------------------------------------------------
    |
    | This array should be used to specify any resource type instance which
    | cannot be serialized and should require a new instance on wake.
    */

    'resources' => [
		Zefire\Memcache\Memcache::class,
		Aws\S3\S3Client::class,
		\PDO::class,
		\PDOStatement::class,
		\Pheanstalk\Pheanstalk::class,
	],
];