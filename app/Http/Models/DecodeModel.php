<?php
declare(strict_types = 1);

namespace App\Http\Models;

use App\Http\Models\Model; 
use App\Helper\EncodingHelper as Helper;
use App\Helper\ShortLinksFileHelper as FileHelper;

class DecodeModel extends Model {

    protected $fileHelper;

    public function __construct(FileHelper $fileHelper)
    {
        parent::__construct();
        $this->fileHelper = $fileHelper;
        $this->fileHelper->setArr($this->shortLinksArr);
    }

    public function getUrlFromId(string $id): ?string
    {
        return $this->fileHelper->matchEncodedIdToUrl($id);
    }

}