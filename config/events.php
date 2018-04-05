<?php

	/*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    | Here you may define custom events for your application events.
    |
    */

return [
    'app-message' => \Zefire\Core\Events\AppMessage::class,
    'db-connect' => \Zefire\Database\Events\Connect::class,
    'db-query' => \Zefire\Database\Events\Query::class,
    'app-auth' => \Zefire\Authentication\Events\AuthEvent::class,
    'app-logout' => \Zefire\Authentication\Events\LogoutEvent::class,
];