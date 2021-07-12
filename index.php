<?php
define('BP', $_SERVER['DOCUMENT_ROOT']);

// composer autoload modules
require BP . '/vendor/autoload.php';

// Include router
require BP . '/routes/api.php';
