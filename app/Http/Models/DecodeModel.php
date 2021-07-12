<?php
declare(strict_types = 1);

namespace App\Http\Models;

use App\Http\Models\Model; 
use App\Helper\ShortLinksArrayHelper as ArrayHelper;

/**
 * DecodeModel
 * 
 */
class DecodeModel extends Model {

    protected $arrayHelper;
    
    /**
     * __construct
     *
     * @param  ShortLinksArrayHelper $arrayHelper
     * @return void
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        parent::__construct();
        $this->arrayHelper = $arrayHelper;
        $this->arrayHelper->setArr($this->shortLinksArr);
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
        return $this->arrayHelper->matchEncodedIdToUrl($id);
    }

}