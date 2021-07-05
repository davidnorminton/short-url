<?php

use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;

use App\Http\Controllers\EncodeController;

$app = AppFactory::create();

// Route to encode a url
$app->get('/encode/{url}', EncodeController::class . ':getPage');

// Route to encode a url
$app->get('/decode/{hash}', function (Request $request, Response $response, array $args) {
    $hash = $args['hash'];
    $response->getBody()->write("Hello, $hash");
    return $response;
});

$app->run();