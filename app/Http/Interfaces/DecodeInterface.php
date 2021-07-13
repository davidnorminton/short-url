<?php

namespace App\Http\Interfaces;

interface DecodeInterface {
    public function responseData(string $query);

    public function getUrlFromId(string $id);
}