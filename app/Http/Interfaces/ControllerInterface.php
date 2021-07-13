<?php

namespace App\Http\Interfaces;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface ControllerInterface {
    public function getPage(Request $request, Response $response, $args);
}