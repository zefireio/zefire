<?php

namespace App\Middlewares;

use Zefire\Middlewares\CsrfToken;

class VerifyCsrfToken extends CsrfToken
{
	protected $exclusion = [];
}