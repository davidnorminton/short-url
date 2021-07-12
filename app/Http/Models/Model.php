<?php
declare(strict_types = 1);

namespace App\Http\Models;

/**
 * Model
 */
class Model {

    protected $fileLocation;
    protected $getFile;
    public $shortLinksArr;

    public function __construct()
    {
        $this->fileLocation = $_SERVER['DOCUMENT_ROOT'] . "/app/Storage/shortlink_store.json";
        $this->getFile = file_get_contents($this->fileLocation);
        $this->shortLinksArr = json_decode($this->getFile, true) ?? array();
    }
}