<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * ShortController
 * 
 */
class ShortController {

    /**
     * urlError
     * Format for api error messages
     * 
     * @param  string $url
     * @return string
     */
    protected function error(string $url, string $msg): string
    {
        $errorMsg = array(
            "error" => $msg,
            "original_url" => $url
        );

        return json_encode($errorMsg);
    }

}