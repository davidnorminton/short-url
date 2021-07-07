<?php

use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Http\Controllers\EncodeController;
use App\Http\Controllers\DecodeController;

$app = AppFactory::create();

// root route
$app->get('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Welcome to ShortLink!");
    return $response;
});

// Route to encode a url
$app->get('/encode/{url}', EncodeController::class . ':getPage');

$app->get('/decode/{hash}', DecodeController::class . ':getPage');

$app->run();