<?php

namespace App\Http\Interfaces;

interface DecodeInterface {
    public function getUrlFromId(string $id);
}