<?php
declare(strict_types = 1);

namespace App\Helper;

/**
 * ValidateData
 * A set of methods used to validate data
 */
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