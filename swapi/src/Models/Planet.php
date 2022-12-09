<?php

namespace SWApi\Models;

use SWApi\DataObject\Planet as DataObjectPlanet;

final class Planet extends BaseModels
{
    protected string $table = 'dbo.sw_planet';

    protected function dataFromObject(\stdClass $object): DataObjectPlanet
    {
        return (new DataObjectPlanet)->fromObject($object);
    }
}
