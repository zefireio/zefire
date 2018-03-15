<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Zefire\Core\Application();

$response = $app->boot()->handle();

$response->send();