<?php

namespace SWApi\DataObject;

final class Planet extends BaseDataObject
{
    protected int $id;
    protected string $name;
    protected ?float $diameter = null;
    protected ?float $rotationPeriod = null;
    protected ?float $orbitalPeriod = null;
    protected ?string $gravity = null;
    protected ?int $population = null;
    protected ?string $climate = null;
    protected ?string $terrain = null;
    protected ?string $surfaceWater = null;
    protected ?\DateTime $created = null;
    protected ?\DateTime $edited = null;

    public function setId(int | string $id): void
    {
        $this->id = (int) $id;
    }

    public function setName(string $name): void
    {
        $this->name = trim($name);
    }

    public function setDiameter(null | int | float | string $diameter): void
    {
        if(!is_null($diameter)) $this->diameter = (float) $diameter;
    }

    public function setRotationPeriod(null | int | float | string $rotationPeriod): void
    {
        if(!is_null($rotationPeriod)) $this->rotationPeriod = (float) $rotationPeriod;
    }

    public function setOrbitalPeriod(null | int | float | string $orbitalPeriod): void
    {
        if(!is_null($orbitalPeriod)) $this->orbitalPeriod = (float) $orbitalPeriod;
    }

    public function setGravity(null | string $gravity): void
    {
        if(!is_null($gravity)) $this->gravity = trim(string: $gravity);
    }

    public function setPopulation(null | int | string $population): void
    {
        if(!is_null($population)) $this->population = (int) $population;
    }

    public function setClimate(null | string $climate): void
    {
        if(!is_null($climate)) $this->climate = trim(string: $climate);
    }

    public function setTerrain(null | string $terrain): void
    {
        if(!is_null($terrain)) $this->terrain = trim(string: $terrain);
    }

    public function setSurfaceWater(null | string $surfaceWater): void
    {
        if(!is_null($surfaceWater)) $this->surfaceWater = trim(string: $surfaceWater);
    }

    public function setCreated(null | string $created): void
    {
        if(!is_null($created)) $this->created = new \DateTime(datetime: $created);
    }

    public function setEdited(null | string $edited): void
    {
        if(!is_null($edited)) $this->edited = new \DateTime(datetime: $edited);
    }
}
