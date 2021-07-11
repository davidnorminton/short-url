<?php

namespace App\Http\Interfaces;

interface EncodeInterface {
    public function shortenUrl(string $url);
    public function addToFile(string $url);
}