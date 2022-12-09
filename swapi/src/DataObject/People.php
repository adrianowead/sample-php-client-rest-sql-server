<?php

namespace SWApi\DataObject;

use SWApi\Commands\Planet;
use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Models\Planet as ModelsPlanet;

final class People extends BaseDataObject
{
    protected string $id;
    protected string $name;
    protected ?float $height;
    protected ?float $mass;
    protected ?string $hairColor;
    protected ?string $skinColor;
    protected ?string $eyeColor;
    protected ?int $birthYear;
    protected ?string $gender;
    protected ?\DateTime $created;
    protected ?\DateTime $edited;
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
        $this->height = $height ?? (float) $height;
    }

    public function setMass(null | int | float | string $mass): void
    {
        $this->mass = $mass ?? (float) $mass;
    }

    public function setHairColor(null | string $hairColor): void
    {
        $this->hairColor = $hairColor ?? (float) $hairColor;
    }

    public function setSkinColor(null | string $skinColor): void
    {
        $this->skinColor = $skinColor ?? trim(string: $skinColor);
    }

    public function setEyeColor(null | string $eyeColor): void
    {
        $this->eyeColor = $eyeColor ?? trim(string: $eyeColor);
    }

    public function setBirthYear(null | int | string $birthYear): void
    {
        $this->birthYear = $birth_year ?? (int) $birthYear;
    }

    public function setGender(null | string $gender): void
    {
        $this->gender = $gender ?? trim(string: $gender);
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
        $this->created = $created ?? new \DateTime(datetime: $created);
    }

    public function setEdited(null | string $edited): void
    {
        $this->edited = $edited ?? new \DateTime(datetime: $edited);
    }
}
