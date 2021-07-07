<?php
declare(strict_types = 1);

/**
 * Class EncodeController
 *  
 **/
namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Http\Controllers\ShortController;
use App\Helper\ValidateData as validate;


/**
 * EncodeController
 */
class EncodeController extends ShortController {



    /**
     * getPage
     * returns a shortened hashed version of the url
     * 
     * @param  Request $request
     * @param  Response $response
     * @param  mixed $args
     * @return Response
     */
    public function getPage(Request $request, Response $response, $args): Response
    {
        $rawUrl = base64_decode($args['url']);

        if(validate::isValidUrl($rawUrl)) {
            $response->getBody()->write($this->responseData($rawUrl));
        } else {
            $response->getBody()->write($this->error($rawUrl, "Invalid URl"));
        }
        return $response;
    }
    
    /**
     * responseData
     * How the data is represented at end point
     * 
     * @param  string $url
     * @return string (json)
     */
    private function responseData(string $url): string
    {
        $short = $this->helper->shortenUrl($url);

        if($short) {
            $responseData = array(
                "original" => $url,
                "short" => $short
            );

            return json_encode($responseData, JSON_UNESCAPED_SLASHES);
        }
        return json_encode($url, "Something went wrong with this URl!");
    }
    
}