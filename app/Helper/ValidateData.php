<?php

namespace App\Helper;

class ValidateData {


    /**
     * isValidUrl
     * validate a url is in correct form
     * 
     * @param  string $url
     * @return string
     */
    public static function isValidUrl(string $url): string
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

}