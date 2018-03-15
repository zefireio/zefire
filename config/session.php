<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Session
    |--------------------------------------------------------------------------
    |
    | This value defines which session handler should be used for sessions.
    | Default's to "Zefire\Session\FileSessionHandler" on error or if none
    | specified. The "life" setting defines how long a session will last
    | before expiring.
    */

	'driver' 	=> Zefire\Session\FileSessionHandler::class,
	'life' 		=> 7200
];