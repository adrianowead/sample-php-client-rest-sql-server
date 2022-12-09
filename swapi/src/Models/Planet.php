<?php

namespace SWApi\Models;

use SWApi\DataObject\BaseDataObject;
use SWApi\DataObject\Planet as DataObjectPlanet;

final class Planet extends BaseModels
{
    protected string $table = 'dbo.sw_planet';
}
