<?php

namespace SWApi\Commands;

use SWApi\DataObject\People as DataObjectPeople;
use SWApi\Models\People as ModelsPeople;
use SWApi\Services\SWApi;

final class People extends BaseCommands
{
    public function __construct()
    {
        $this->endpoint = 'people';
    }

    public function getAll(): array
    {
        $out = parent::getAll();

        dump("Pessoas encontradas (" . sizeof($out) . "), buscando detalhes de cada um...");

        foreach ($out as $k => $people) {
            $fromDB = (new ModelsPeople())->getFromId(id: (int) $people->uid);

            if (!empty($fromDB)) {
                $out[$k] = $fromDB;
            } else {
                $out[$k] = $this->getFromId(
                    id: $people->uid
                );
            }
        }

        return $out;
    }

    public function getFromId(int $id): DataObjectPeople
    {
        $data = SWApi::call(path: "/{$this->endpoint}/{$id}");
        $data->result->properties->id = $id;
        $data->result->properties->homeworld = preg_replace(
            pattern: '/[^0-9]/',
            replacement: '',
            subject: $data->result->properties->homeworld
        );

        unset($data->result->properties->url);

        return (new DataObjectPeople())->fromObject(object: $data->result->properties);
    }
}
