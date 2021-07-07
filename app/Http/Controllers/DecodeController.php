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
        $data = $this->responseData($hash);

        if($data) {
            $response->getBody()->write($data);
        } else {
            $response->getBody()->write(json_encode($this->error($hash, "The hash is invalid!")));
        }
        
        return $response->withHeader('Content-type', 'application/json');
    }

    /**
     * responseData
     * How the data is represented at end point
     * 
     * @param  string $url
     * @return string (json)
     */
    private function responseData(string $hash): ?string
    {
        $url = $this->helper->matchHashToUrl($hash);

        if($url) {
            $responseData = array(
                "original" => $url,
                "short" => $hash,
                "slimLinkUrl" => $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']. "/decode/$hash"
            );

            return json_encode($responseData, JSON_UNESCAPED_SLASHES);
        }
        return null;
    }

}