<?php

namespace SWApi\Commands;

use SWApi\DataObject\BaseDataObject;
use SWApi\Services\SWApi;

abstract class BaseCommands
{
    protected string $enpoint;

    public function getAll(): array
    {
        $out = [];
        $currentPage = 1;

        do {
            dump("Buscando /{$this->endpoint} página {$currentPage}");

            $data = SWApi::call(
                path: "/{$this->endpoint}",
                params: [
                'page' => $currentPage,
                'limit' => 10
                ]
            );

            $out = array_merge($out, $data->results);

            $currentPage++;
        } while (!empty($data->next));

        return $out;
    }

    abstract public function getFromId(int $id): BaseDataObject;
}
