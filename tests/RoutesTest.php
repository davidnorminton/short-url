<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    // protocol to use
    private $proto = 'http://';

    // IP address of app
    private $ip = '127.0.0.1';

    // Port of app
    private $port = ':8080';

    // encode url
    private $encode = '/encode?url=';

    // test encode parameter
    private $testEncode = 'https://google.com/';

    // decode url 
    private $decode = '/decode?id=';


    // test encode endpoint
    public function testEncodeRoute() : void
    {

        $url = $this->proto  .$this->ip . $this->port . $this->encode. $this->testEncode;

        $output = file_get_contents($url);
        $decodeOutput = json_decode($output, true);
        echo  PHP_EOL . "Testing encode endpoint" . PHP_EOL;
        $this->assertEquals($this->testEncode, $decodeOutput['original']);
    }

    // test decode endpoint
    public function testDecodeRoute() : void
    {
        $url = $this->proto . $this->ip . $this->port . $this->decode . '1';

        $output = file_get_contents($url);
        $decodeOutput = json_decode($output, true);
        echo  PHP_EOL . "Testing decode endpoint" . PHP_EOL;
        $this->assertEquals("https://www.amazon.co.uk", $decodeOutput['url']);
    }

}