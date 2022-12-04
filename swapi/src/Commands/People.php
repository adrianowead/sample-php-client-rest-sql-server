<?php

namespace SWApi\Commands;

use SWApi\DataObject\People as DataObjectPeople;
use SWApi\Services\SWApi;

final class People extends BaseCommands {

    public function __construct()
    {
        $this->endpoint = $this->signature = 'people';
    }

    public function getFromId(int $id): DataObjectPeople
    {
        $data = SWApi::call("/{$this->endpoint}/{$id}");
        $data->result->properties->id = $id;
        $data->result->properties->homeworld = preg_replace('/[^0-9]/', '', $data->result->properties->homeworld);

        unset($data->result->properties->url);

        return (new DataObjectPeople)->fromJson(json_encode($data->result->properties));
    }
}