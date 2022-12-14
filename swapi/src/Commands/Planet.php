<?php

namespace SWApi\Commands;

use GuzzleHttp\Client;
use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Models\Planet as ModelsPlanet;

final class Planet extends BaseCommands
{
    public function __construct(?Client $client = null)
    {
        parent::__construct($client);

        $this->endpoint = 'planets';
    }

    public function getAll(): array
    {
        $out = parent::getAll();

        dump("Planetas encontrados (" . sizeof($out) . "), buscando detalhes de cada um...");

        foreach ($out as $k => $planet) {
            $fromDB = (new ModelsPlanet())->getFromId(id: (int) $planet->uid);

            if (!empty($fromDB)) {
                $out[$k] = $fromDB;
            } else {
                $out[$k] = $this->getFromId(
                    id: $planet->uid
                );
            }
        }

        return $out;
    }

    public function getFromId(int $id): DataObjectPlanet
    {
        $data = $this->swApi::call(path: "/{$this->endpoint}/{$id}");
        $data->result->properties->id = $id;

        unset($data->result->properties->url);

        return (new DataObjectPlanet())->fromObject(object: $data->result->properties);
    }
}
