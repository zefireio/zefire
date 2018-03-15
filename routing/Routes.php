<?php

// Authentication Routes
\Route::get('/auth/login', 'Auth\Authenticate@getLoginForm');
\Route::post('/auth/login', 'Auth\Authenticate@login');
\Route::get('/auth/logout', 'Auth\Authenticate@logout');

// Registration Routes
\Route::get('/auth/register', 'Auth\Register@getRegistrationForm');
\Route::post('/auth/register', 'Auth\Register@register');

// Homepage
\Route::get('/', function() {
	return \View::render('documentation.documentation');
});

// Documentation
\Route::get('/documentation', function() {
	return \View::render('documentation.documentation');
}); 

// Documentation
\Route::get('/api-documentation', function() {
	\Redirect::to('/api-documentation/Zefire.html');
});

// Contribution guide
\Route::get('/contribute', function() {
	return \View::render('contribute.contribute');
});