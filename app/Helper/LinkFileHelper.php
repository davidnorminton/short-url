<?php
declare(strict_types = 1);

namespace App\Helper;

class LinkFileHelper {

    protected $fileLocation;
    private $getFile;
    public $shortLinksArr;

    public function __construct()
    {
        $this->fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/app/Storage/shortlink_store.json";
        $this->getFile = file_get_contents($this->fileLocation);
    }

    public function getFileContents()
    {
        return $this->getFile;
    }

    public function getFileLocation()
    {
        return $this->fileLocation;
    }
}