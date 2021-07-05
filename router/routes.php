<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;

$app = AppFactory::create();

// Route to encode a url
$app->get('/encode/{url}', function (Request $request, Response $response, array $args) {
    $url = $args['url'];
    $response->getBody()->write("Hello, $url");
    return $response;
});

// Route to encode a url
$app->get('/decode/{hash}', function (Request $request, Response $response, array $args) {
    $hash = $args['hash'];
    $response->getBody()->write("Hello, $hash");
    return $response;
});

$app->run();