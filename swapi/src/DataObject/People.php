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
    protected ?string $hair_color;
    protected ?string $skin_color;
    protected ?string $eye_color;
    protected ?int $birth_year;
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

    public function setHair_color(null | string $hair_color): void
    {
        $this->hair_color = $hair_color ?? (float) $hair_color;
    }

    public function setSkin_color(null | string $skin_color): void
    {
        $this->skin_color = $skin_color ?? trim(string: $skin_color);
    }

    public function setEye_color(null | string $eye_color): void
    {
        $this->eye_color = $eye_color ?? trim(string: $eye_color);
    }

    public function setBirth_year(null | int | string $birth_year): void
    {
        $this->birth_year = $birth_year ?? (int) $birth_year;
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
