<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    // protocol to use
    private $proto = 'http://';

    // IP address of app
    private $ip = '127.0.0.1';

    // Port of app
    private $port = ':9090';

    // encode url
    private $encode = '/encode/';

    // test encode parameter
    private $testEncode = 'https://google.com/';

    // decode url 
    private $decode = '/decode/';


    // test encode endpoint
    public function testEncodeRoute() : void
    {
        $base64EncodeTestUrl = base64_encode($this->testEncode);

        $url = $this->proto  .$this->ip . ':'. $this->port . $this->encode. $base64EncodeTestUrl;

        $output = file_get_contents($url);
        $decodeOutput = json_decode($output, true);
        echo  PHP_EOL . "Testing encode endpoint" . PHP_EOL;
        $this->assertEquals($this->testEncode, $decodeOutput['original']);
    }

    // test decode endpoint
    public function testDecodeRoute() : void
    {
        $base64EncodeTestUrl = base64_encode($this->testEncode);

        $url = $this->proto . $this->ip . $this->port . $this->decode . '1';

        $output = file_get_contents($url);
        $decodeOutput = json_decode($output, true);
        echo  PHP_EOL . "Testing decode endpoint" . PHP_EOL;
        $this->assertEquals($this->testEncode, $decodeOutput['original']);
    }

}