<?php

return [
	
	/*
    |--------------------------------------------------------------------------
    | Provider
    |--------------------------------------------------------------------------
    |
    | This value defines which model should be used for Zefire's default
    | authentication mechanism.
    |
	|	default: App\Models\User
	|
    */

	'provider' => \App\Models\User::class,
];