<?php
declare(strict_types = 1);

namespace App\Helper;

/**
 * EncodingHelper
 * A set of utility functions to help encode/decode data
 * 
 */
class EncodingHelper {

    protected $lookupTableLocation;
    protected $lookupJsonFile;

    public function __construct()
    {
        $this->lookupTableLocation = $_SERVER['DOCUMENT_ROOT'] . "/app/Storage/Hash_lookup.json";
        $this->lookupJsonFile = file_get_contents($this->lookupTableLocation);
    }

    /**
     * shortenUrl
     * return a hash shorter than the original url 
     * 
     * @param  string $url
     * @return string
     */
    public function shortenUrl(string $url): string
    {
        $hash = $this->lookupUrl($url);

        return !$hash ? $this->addTOLookup($url) : $hash;
    }
 
    
    /**
     * convertToUrl
     * Takes a hashed url and returns original url
     * 
     * @param  string $hash
     * @return string
     */
    public function convertToUrl(string $hash): ?string
    {
        return $this->lookupHash($hash) ?? null;
    }

    

    
    /**
     * addToLookup
     * add a new url to stored hashes
     *
     * @param  string $url
     * @return void
     */
    public function addToLookup(string $url): ?string 
    {
        $json = json_decode($this->lookupJsonFile, true) ?? [];
        // NOT A GOOD METHOD FOR THIS AS DELETIONS WOULD CAUSED COLLISIONS WITH FUTURE INSERTS!

        $lenJson = count($json);

        $lastId = $json[$lenJson - 1] ?? 0;

        // CHANGE THE ABOVE METHOD FOR GETTING NEWSEST ID!!
        $hash = base_convert($lastId + 1, 10, 36);

        array_push($json, ["hash" => $hash, "url" => $url]);

        if(file_put_contents($this->lookupTable, json_encode($json, JSON_UNESCAPED_SLASHES))) {
            return $hash;
        }

        return null;
    }
    
    
    /**
     * convertBase36ToDecimal
     *
     * @param  mixed $numb
     * @return void
     */
    private function convertBase36ToDecimal($numb)
    {
        return base_convert($numb, 36, 10);
    }

    
    /**
     * getLastItemInLookupTable
     *
     * @return 
     */
    private function getLastItemInLookupTable(): ?array
    {
        $json = json_decode($this->lookupJsonFile, true);
        return $json[count($json) - 1] ?? null;
    }
    

    /**
     * lookupHash
     * Search stored hases for a hash matching input
     *
     * @param  string $hash
     * @return void
     */
    public function lookupHash($hash): ?string
    {
        $hashes = json_decode($this->lookupJsonFile, true);

        foreach($hashes as $hash) {
            if($hash["hash"] === $hash) {
                return $hash;
            }
        }

        return null;
    }
    

    /**
     * lookupUrl
     * Search stored hashes for a url matching input 
     *
     * @param  string $url
     * @return void
     */
    public function lookupUrl(string $url): ?string
    {
        $hashes = json_decode($this->lookupJsonFile, true);

        foreach($hashes as $hash) {
            if($hash["url"] === $url) {
                return $hash['hash'];
            }
        }

        return null;
    }
    

    /**
     * matchHashToUrl
     * finds a hash then returns its associated url
     *
     * @param  mixed $hash
     * @return string
     */
    public function matchHashToUrl(string $findHash): ?string
    {
        $hashes = json_decode($this->lookupJsonFile, true);

        foreach($hashes as $hash) {
            if($hash["hash"] === $findHash) {
                return $hash['url'];
            }
        }

        return null;
    }
}