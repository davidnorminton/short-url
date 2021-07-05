<?php
/**
 * Class EncodeController
 *  
 **/
namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Helper\EncodingHelper as helper;

/**
 * EncodeController
 */
class EncodeController {

        
    /**
     * getPage
     *
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return void
     */
    public function getPage($request, $response, $args)
    {
        $url = $args['url'];
        $encode = new EncodeController();
        //echo $encode->hashUrl($url);
        $response->getBody()->write(helper::removeBase64EncodingFromUrl($url));

        return $response;
    }

}