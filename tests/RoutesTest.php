<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    // IP address of app
    private $ip = '127.0.0.1';

    // Port of app
    private $port = '9091';

    // encode url
    private $encode = '/encode';

    // test encode parameter
    private $testEncode = 'https://google.com/';

    // decode url 
    private $decode = '/decode';



    public function testEncodeRoute() : void
    {
        $base64EncodeTestUrl = base64_encode($this->testEncode);

        $url = $this->ip . ':'. $this->port . '/'. $base64EncodeTestUrl;

        echo $url;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);
        
        curl_close ($ch);

        $this->assertEquals($base64EncodeTestUrl, $server_output);
    }

}