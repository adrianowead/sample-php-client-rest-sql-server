<?php

namespace SWApi\DataObject;

use SWApi\Commands\Planet;
use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Models\Planet as ModelsPlanet;

final class People extends BaseDataObject
{
    protected int $id;
    protected string $name;
    protected ?float $height = null;
    protected ?float $mass = null;
    protected ?string $hairColor = null;
    protected ?string $skinColor = null;
    protected ?string $eyeColor = null;
    protected ?int $birthYear = null;
    protected ?string $gender = null;
    protected ?\DateTime $created = null;
    protected ?\DateTime $edited = null;
    protected DataObjectPlanet $homeworld;

    public function setId(int | string $id): void
    {
        $this->id = (int) $id;
    }

    public function setName(string $name): void
    {
        $this->name = trim($name);
    }

    public function setHeight(null | int | float | string $height): void
    {
        if(!is_null($height)) $this->height = (float) $height;
    }

    public function setMass(null | int | float | string $mass): void
    {
        if(!is_null($mass)) $this->mass = (float) $mass;
    }

    public function setHairColor(null | string $hairColor): void
    {
        if(!is_null($hairColor)) $this->hairColor = (float) $hairColor;
    }

    public function setSkinColor(null | string $skinColor): void
    {
        if (!is_null($skinColor)) $this->skinColor = trim(string: $skinColor);
    }

    public function setEyeColor(null | string $eyeColor): void
    {
        if (!is_null($eyeColor)) $this->eyeColor = trim(string: $eyeColor);
    }

    public function setBirthYear(null | int | string $birthYear): void
    {
        if (!is_null($birthYear)) $this->birthYear = (int) $birthYear;
    }

    public function setGender(null | string $gender): void
    {
        if (!is_null($gender)) $this->gender = trim(string: $gender);
    }

    public function setHomeworld(int | string $homeworldId): void
    {
        $fromDB = (new ModelsPlanet())->getFromId(id: (int) $homeworldId);

        if (!empty($fromDB)) {
            $this->homeworld = $fromDB;
            return ;
        }

        $this->homeworld = (new Planet())->getFromId(id: (int) $homeworldId);
    }

    public function setCreated(null | string $created): void
    {
        if (!is_null($created)) $this->created = new \DateTime(datetime: $created);
    }

    public function setEdited(null | string $edited): void
    {
        if (!is_null($edited)) $this->edited = new \DateTime(datetime: $edited);
    }
}
