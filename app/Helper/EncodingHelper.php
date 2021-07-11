<?php
declare(strict_types = 1);

namespace App\Helper;

/**
 * EncodingHelper
 * A set of utility functions to help encode/decode data
 * 
 */
class EncodingHelper {
    
    /**
     * convertBase36ToDecimal
     *
     * @param  mixed $numb
     * @return string
     */
    public static function convertBase36ToDecimal($numb): string
    {
        return base_convert($numb, 36, 10);
    }

    public static function convertDecimalToBase36(int $decimal): string
    {
        return base_convert($decimal, 10, 36);
    }
    
}