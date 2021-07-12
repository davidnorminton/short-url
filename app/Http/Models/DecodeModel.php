<?php
declare(strict_types = 1);

namespace App\Http\Models;

use App\Http\Models\Model; 
use App\Helper\ShortLinksArrayHelper as ShortLinksArrayHelper;

/**
 * DecodeModel
 * 
 */
class DecodeModel extends Model {

    protected $fileHelper;
    
    /**
     * __construct
     *
     * @param  ShortLinksArrayHelper $ShortLinksArrayHelper
     * @return void
     */
    public function __construct(ShortLinksArrayHelper $ShortLinksArrayHelper)
    {
        parent::__construct();
        $this->ShortLinksArrayHelper = $ShortLinksArrayHelper;
        $this->ShortLinksArrayHelper->setArr($this->shortLinksArr);
    }
    
    /**
     * getUrlFromId
     * return url that matches the id
     *
     * @param  string $id
     * @return string | null
     */
    public function getUrlFromId(string $id): ?string
    {
        return $this->ShortLinksArrayHelper->matchEncodedIdToUrl($id);
    }

}