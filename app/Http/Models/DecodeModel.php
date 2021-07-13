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
     * responseData
     * How the data is represented at end point
     * 
     * @param  string $url
     * @return string (json)
     */
    public function responseData(string $query): ?string
    {
        $url = $this->getUrlFromId($query);

        if($url) {
            $responseData = array(
                "id" => $query,
                "url" => $url            
            );

            return json_encode($responseData,  JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }
        return null;
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