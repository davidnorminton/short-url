<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Http\Interfaces\ControllerInterface;
use App\Http\Models\DecodeModel as DecodeModel;
use App\Http\Controllers\ShortController;
use App\Helper\ShortLinksArrayHelper as ArrayHelper;


/**
 * DecodeController
 * 
 */
class DecodeController extends ShortController implements ControllerInterface {

    public $decodeModel;
    public $arrayHelper;

    public function __construct()
    {
        // DecodeModel depends on App\Helper\ShortLinksFileHelper
        $this->decodeModel = new DecodeModel(new ArrayHelper);
    }

    /**
     * getPage
     * returns the url associated with the id
     *      
     * @Route("/decode/{hash}", methods={"GET"})
     * 
     * @param  Request $request
     * @param  Response $response
     * @param  array $args
     * @return Response
     */
    public function getPage(Request $request, Response $response, $args): Response
    {
        $id = $request->getQueryParams("url")["id"];

        if($id) {
            $response->getBody()->write($this->decodeModel->responseData($id));
        } else {
            $response->getBody()->write($this->error($id, "Invalid URl"));
        }

        return $response->withHeader('Content-type', 'application/json');
    }

}