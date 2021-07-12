<?php
declare(strict_types = 1);

namespace App\Http\Models;

use App\Http\Models\Model; 
use App\Http\Interfaces\EncodeInterface;
use App\Helper\EncodingHelper;
use App\Helper\ShortLinksArrayHelper as ArrayHelper;

/**
 * EncodeModel
 */
class EncodeModel extends Model implements EncodeInterface {

    protected $arrayHelper;
    
    /**
     * __construct
     *
     * @param  ShortLinksArrayHelper $ShortLinksArrayHelper
     * @return void
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        parent::__construct();
        $this->arrayHelper = $arrayHelper;
        $this->arrayHelper->setArr($this->shortLinksArr);
    }

    /**
     * shortenUrl
     * return id shorter than the original url 
     * 
     * @param  string $url
     * @return string
     */
    public function shortenUrl(string $url): string
    {
        $id = $this->arrayHelper->findIdFromUrl($url);
        // if id doesn't exist create a new entry
        return !$id ? $this->addToFile($url) : $id;
    }

    
    /**
     * addToFile
     * add a new url to stored encoded strings
     *
     * @param  string $url
     * @return void
     */
    public function addToFile(string $url): ?string 
    {

        $lastItem = $this->arrayHelper->getLastItemInArray();
        $nextId = 0;

        if($lastItem) {
            $lastEncodeId = EncodingHelper::convertBase36ToDecimal($lastItem['id']);
            $nextId = $lastEncodeId + 1;
        }

        $encodeId =  EncodingHelper::convertDecimalToBase36((int) $nextId);

        array_push($this->shortLinksArr, ["id" => $encodeId, "url" => $url]);

        
        if(file_put_contents(
            $this->fileLocation, 
            json_encode($this->shortLinksArr, JSON_UNESCAPED_SLASHES))
          ) {
            return $encodeId;
        }

        return null;
    }

}