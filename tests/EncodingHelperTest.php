<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Helper\EncodingHelper as helper;


final class EncodingHelperTest extends TestCase
{
    public function testRemoveBase64EncodingFromUrl()
    {
        $helper = new helper();
        $rawUrl = $helper->removeBase64EncodingFromUrl("aHR0cHM6Ly9nb29nbGUuY29tLw==");
        $this->assertEquals($rawUrl, "https://google.com/");
    }

}