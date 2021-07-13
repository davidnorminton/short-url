<?php

namespace App\Http\Interfaces;

interface EncodeInterface {
    public function responseData(string $query);

    public function shortenUrl(string $url);

    public function addToFile(string $url);
}