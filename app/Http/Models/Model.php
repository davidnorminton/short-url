<?php
declare(strict_types = 1);

namespace App\Http\Models;

use App\Helper\LinkFileHelper as FileHelper;

/**
 * Model
 */
class Model {

    protected $fileHelper;
    protected $fileLocation;
    protected $getFile;
    public $shortLinksArr;

    public function __construct()
    {

        $this->fileHelper = new FileHelper();
        $this->fileLocation = $this->fileHelper->getFileLocation();
        $this->getFile = $this->fileHelper->getFileContents();
        $this->shortLinksArr = json_decode($this->getFile, true) ?? array();
    }
}