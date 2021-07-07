<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Http\Controllers\ShortController;

/**
 * DecodeController
 * 
 */
class DecodeController extends ShortController {

    /**
     * getPage
     * returns the url associated with the hash
     * 
     * @param  Request $request
     * @param  Response $response
     * @param  array $args
     * @return Response
     */
    public function getPage(Request $request, Response $response, $args): Response
    {
        $hash = $args['hash'];
        $response->getBody()->write("decode url $hash");
        return $response;
    }

}