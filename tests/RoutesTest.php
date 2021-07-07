<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    // IP address of app
    private $ip = '127.0.0.1';

    // Port of app
    private $port = '9090';

    // encode url
    private $encode = '/encode';

    // test encode parameter
    private $testEncode = 'https://google.com/';

    // decode url 
    private $decode = '/decode';


    // test encode endpoint
    public function testEncodeRoute() : void
    {
        $base64EncodeTestUrl = base64_encode($this->testEncode);

        $url = 'http://' .$this->ip . ':'. $this->port . '/encode/'. $base64EncodeTestUrl;

        $output = file_get_contents($url);
        $decodeOutput = json_decode($output, true);
        echo "Testing encode endpoint";
        $this->assertEquals($this->testEncode, $decodeOutput['original']);
    }

    // test decode endpoint
    public function testDecodeRoute() : void
    {
        $base64EncodeTestUrl = base64_encode($this->testEncode);

        $url = 'http://' .$this->ip . ':'. $this->port . '/decode/1';

        $output = file_get_contents($url);
        $decodeOutput = json_decode($output, true);
        echo "Testing encode endpoint";
        $this->assertEquals($this->testEncode, $decodeOutput['original']);
    }

}