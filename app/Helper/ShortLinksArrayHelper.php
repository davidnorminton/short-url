<?php

namespace App\Helper;

class ShortLinksArrayHelper {

    public $arr;


    public function setArr($arr)
    {
        $this->arr = $arr;
    }

    /**
     * existsId
     * Search an array of objects
     * match a key to "id"
     *
     * @param  string $id
     * @return void
     */
    public function existsId(string $id): ?string
    {
        foreach($this->arr as $item) {
            if($item["id"] === $id) {
                return $id;
            }
        }

        return null;
    }
    

    /**
     * findIdFromUrl
     * Search array of objects
     * Match key of url 
     *
     * @param  string $url
     * @return string
     */
    public function findIdFromUrl(string $url): ?string
    {
        foreach($this->arr as $item) {
            if($item["url"] === $url) {
                return $item['id'];
            }
        }

        return null;
    }
    

    /**
     * matchEncodeStringToUrl
     * finds an id then returns its associated url
     *
     * @param  string findId
     * @return string
     */
    public function matchEncodedIdToUrl(string $findId): ?string
    {
        foreach($this->arr as $item) {
            if($item["id"] === $findId) {
                return $item['url'];
            }
        }

        return null;
    }
    
    /**
     * getLastItemInArray
     *
     * @return array | null
     */
    public function getLastItemInArray(): ?array
    {
        return $this->arr[count($this->arr) - 1] ?? null;
    }

}