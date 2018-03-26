<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Email drivers
    |--------------------------------------------------------------------------
    |
    | Here you may specify which driver should be used to send
    | transactionnal emails. Zefire only comes with a Mailgun driver.
    |
    */

	'mailgun' => [
    	'driver'       => \Zefire\Mail\MailGunAdapter::class,
    	'key'          => getenv('MAILGUN_KEY'),
    	'domain'       => getenv('MAILGUN_DOMAIN'),
        'endpoint'     => getenv('MAILGUN_URL'),
        'username'     => getenv('MAILGUN_USERNAME'),
        'password'     => getenv('MAILGUN_PASSWORD')
	]
];