<?php
declare(strict_types = 1);

/**
 * Class EncodeController
 *  
 **/
namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Http\Interfaces\ControllerInterface;
use App\Http\Models\EncodeModel as EncodeModel;
use App\Http\Controllers\ShortController;
use App\Helper\ValidateData as validate;
use App\Helper\ShortLinksArrayHelper as ArrayHelper;

/**
 * EncodeController
 */
class EncodeController extends ShortController implements ControllerInterface {

    public $encodeModel;
    public $arrayHelper;

    public function __construct()
    {
        // EncodeModel depends on App\Helper\ShortLinksFileHelper
        $this->encodeModel = new EncodeModel(new ArrayHelper);
    }

    /**
     * getPage
     * returns a shortened hashed version of the url
     * 
     * @Route("/encode/{url}", methods={"GET"})
     *
     * @param  Request $request
     * @param  Response $response
     * @param  mixed $args
     * @return Response
     */
    public function getPage(Request $request, Response $response, $args): Response
    {
        $url = $request->getQueryParams("url")["url"];

        if(validate::isValidUrl($url)) {
            $response->getBody()->write($this->responseData($url));
        } else {
            $response->getBody()->write($this->error($url, "Invalid URl"));
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
    public function responseData(string $query): ?string
    {
        $encodeId = $this->encodeModel->shortenUrl($query);

        if($encodeId) {
            $responseData = array(
                "original" => $query,
                "id" => $encodeId,
                "slimlink_decode_url" => $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . "/decode/$encodeId"
            );

            return json_encode($responseData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }
        return null;
    }
    
}