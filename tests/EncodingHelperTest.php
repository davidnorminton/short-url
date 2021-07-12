<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Helper\EncodingHelper as helper;


final class EncodingHelperTest extends TestCase
{
    public function testConvertBase36ToDecimal()
    {
        $helper = new helper();
        // aa = 370
        $decimal = $helper->convertBase36ToDecimal("aa");
        $this->assertEquals($decimal, "370");
    }

    public function testConvertDecimalToBase36()
    {
        $helper = new helper();
        // aa = 370
        $base36 = $helper->convertDecimalToBase36(370);
        $this->assertEquals($base36, "aa");
    }

}