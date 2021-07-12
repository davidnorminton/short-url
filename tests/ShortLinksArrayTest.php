<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use App\Helper\ShortLinksArrayHelper;

/**
 * ShortLinksArrayTest
 * 
 * test methods in App\Helper\ShortLinksArrayHelper
 */
final class ShortLinksArrayTest extends TestCase
{
    private $array;

    private $arrayHelper;

    protected function setUp():void
    {
        // mock array for tests
        $this->array = [
            0 => ["id" => "1", "url" => "https://google.com"],
            1 => ["id" => "2", "url" => "https://amazon.com"]
        ];

        $this->arrayHelper = new ShortLinksArrayHelper();
        $this->arrayHelper->setArr($this->array);
    }

    public function testExistsId(): void
    {
        $idExists = $this->arrayHelper->existsId("1");
        echo PHP_EOL . "Testing App\Helper\ShortLinksArrayHelper\\existsId" . PHP_EOL;
        $this->assertEquals($idExists, "1");
    }

    public function testFindIdFromUrl(): void
    {
        $getUrl = $this->arrayHelper->findIdFromUrl("https://google.com");
        echo PHP_EOL . "Testing App\Helper\ShortLinksArrayHelper\\findIdFromUrl" . PHP_EOL;
        $this->assertEquals($getUrl, "1");
    }

    public function testMatchEncodedIdToUrl(): void
    {
        $url = $this->arrayHelper->matchEncodedIdToUrl("1");
        echo PHP_EOL . "Testing App\Helper\ShortLinksArrayHelper\\matchEncodedIdToUrl" . PHP_EOL;
        $this->assertEquals($url, "https://google.com");

    }

    public function testGetLastItemInArray(): void
    {
        $item = $this->arrayHelper->getLastItemInArray();
        echo PHP_EOL . "Testing App\Helper\ShortLinksArrayHelper\\getLastItemInArray" . PHP_EOL;
        $this->assertEquals($item["url"], "https://amazon.com");

    }

}