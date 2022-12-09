<?php

namespace SWApi\Models;

use SWApi\DataObject\BaseDataObject;
use SWApi\DataObject\People as DataObjectPeople;

final class People extends BaseModels
{
    protected string $table = 'dbo.sw_people';

    public function saveIfNotExists(BaseDataObject $object): void
    {
        (new Planet())->saveIfNotExists(object: $object->homeworld);

        parent::saveIfNotExists(object: $object);
    }

    protected function dataFromObject(\stdClass $object): DataObjectPeople
    {
        return (new DataObjectPeople)->fromObject($object);
    }
}
