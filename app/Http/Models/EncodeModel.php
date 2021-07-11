<?php
declare(strict_types = 1);

namespace App\Http\Models;

use App\Http\Models\Model; 

use App\Helper\EncodingHelper as Helper;

use App\Helper\ShortLinksFileHelper as FileHelper;

class EncodeModel extends Model {

    protected $fileHelper;

    public function __construct(FileHelper $fileHelper)
    {
        parent::__construct();
        $this->fileHelper = $fileHelper;
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
        $id = $this->fileHelper->findIdFromUrl($this->shortLinksArr, $url);
        return !$id ? $this->addToFile($url) : $id;
    }

    /**
     * convertToUrl
     * Takes an encode id hen returns matching url key in object
     * 
     * @param  string $hash
     * @return string
     */
    public function convertToUrl(string $id): ?string
    {
        return $this->fileHelper->existsId($this->shortLinksArr, $id) ?? null;
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

        $lastItem = $this->getLastItemInArray();
        $nextId = 0;

        if($lastItem) {
            $lastEncodeId = Helper::convertBase36ToDecimal($lastItem['id']);
            $nextId = $lastEncodeId + 1;
        }

        $encodeId =  Helper::convertDecimalToBase36((int) $nextId);

        array_push($this->shortLinksArr, ["id" => $encodeId, "url" => $url]);

        
        if(file_put_contents(
            $this->fileLocation, 
            json_encode($this->shortLinksArr, JSON_UNESCAPED_SLASHES))
          ) {
            return $encodeId;
        }

        return null;
    }

        
    /**
     * getLastItemInLookupTable
     *
     * @return array | null
     */
    private function getLastItemInArray(): ?array
    {
        return $this->shortLinksArr[count($this->shortLinksArr) - 1] ?? null;
    }
}