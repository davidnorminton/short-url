<?php

namespace App\Helper;

/**
 * EncodingHelper
 */
class EncodingHelper {

    /**
     * removeBase64EncodingFromUrl
     * remove the base64 encoding to reveal the original user 
     * 
     * @param  mixed $url
     * @return String
     */
    public static function removeBase64EncodingFromUrl(String $url): String
    {
        return base64_decode($url);

    }
   
    /**
     * shortenUrl
     * return a hash shorter than the original url 
     * 
     * @param  mixed $url
     * @return String
     */
    public static function shortenUrl(String $url): String
    {
        return $url;
    }
 
    /**
     * encodeString
     * return a hash of string
     *
     * @param  mixed $str
     * @return String
     */
    private function encodeString(String $str): String
    {
        return $str;
    }


    /**
     * decodeHash
     * decode hash back to original string
     * 
     * @param  mixed $hash
     * @return String
     */
    private function decodeHash(String $hash): String
    {
        return $hash;
    }
}