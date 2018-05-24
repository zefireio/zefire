<?php

// Authentication Routes
\Route::get('/login', 'Auth\Authenticate@getLoginForm');
\Route::post('/login', 'Auth\Authenticate@login');
\Route::get('/logout', 'Auth\Authenticate@logout');

// Registration Routes
\Route::get('/register', 'Auth\Register@getRegistrationForm');
\Route::post('/register', 'Auth\Register@register');

\Route::get('/', function() {
	return \View::render('home.index');
});
