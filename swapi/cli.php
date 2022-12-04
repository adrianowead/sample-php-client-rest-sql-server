<?php

use SWApi\Commands\People;
use SWApi\Commands\Planet;

if (php_sapi_name() !== 'cli') {
    exit;
}

require_once __DIR__ . "/vendor/autoload.php";

// listar todas as pessoas
// dump("Buscando todas as pessoas");
$people = new People;
// dump($people->getAll());

// pessoa específica
dump("Buscando uma pessoa espefífica");
dump($people->getFromId(2));



// listar todos os planetas
dump("Buscando todos os planetas");
$planet = new Planet;
//dump($planet->getAll());

// planeta específico
dump("Buscando um planeta específico");
dump($planet->getFromId(2));