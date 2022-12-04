<?php

use SWApi\Commands\People;

if (php_sapi_name() !== 'cli') {
    exit;
}

require_once __DIR__ . "/vendor/autoload.php";

// listar todas as pessoas
$people = new People;

var_dump($people->getAll());