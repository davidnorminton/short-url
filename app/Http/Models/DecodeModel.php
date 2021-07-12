<?php
declare(strict_types = 1);

namespace App\Http\Models;

use App\Http\Models\Model; 
use App\Helper\ShortLinksArrayHelper as ShortLinksArrayHelper;

class DecodeModel extends Model {

    protected $fileHelper;

    public function __construct(ShortLinksArrayHelper $ShortLinksArrayHelper)
    {
        parent::__construct();
        $this->ShortLinksArrayHelper = $ShortLinksArrayHelper;
        $this->ShortLinksArrayHelper->setArr($this->shortLinksArr);
    }

    public function getUrlFromId(string $id): ?string
    {
        return $this->ShortLinksArrayHelper->matchEncodedIdToUrl($id);
    }

}