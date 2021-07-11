<?php

namespace App\Helper;

class ShortLinksFileHelper {

    /**
     * existsId
     * Search an array of objects
     * match a key to "id"
     *
     * @param  array $arr
     * @param  string $id
     * @return void
     */
    public function existsId(array $arr, string $id): ?string
    {
        foreach($arr as $item) {
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
     * @param  array $arr
     * @param  string $url
     * @return string
     */
    public function findIdFromUrl(array $arr, string $url): ?string
    {
        foreach($arr as $item) {
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
     * @param  array $arr
     * @param  string findId
     * @return string
     */
    public function matchEncodeStringToUrl(array $arr, string $findId): ?string
    {
        foreach($arr as $item) {
            if($item["id"] === $findId) {
                return $item['url'];
            }
        }

        return null;
    }
    

}