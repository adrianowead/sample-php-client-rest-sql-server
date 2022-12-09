<?php

namespace SWApi\DataObject;

final class Planet extends BaseDataObject
{
    protected int $id;
    protected string $name;
    protected ?float $diameter;
    protected ?float $rotationPeriod;
    protected ?float $orbitalPeriod;
    protected ?string $gravity;
    protected ?int $population;
    protected ?string $climate;
    protected ?string $terrain;
    protected ?string $surfaceWater;
    protected ?\DateTime $created;
    protected ?\DateTime $edited;

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
        $this->diameter = $diameter ?? (float) $diameter;
    }

    public function setRotationPeriod(null | int | float | string $rotationPeriod): void
    {
        $this->rotationPeriod = $rotationPeriod ?? (float) $rotationPeriod;
    }

    public function setOrbitalPeriod(null | int | float | string $orbitalPeriod): void
    {
        $this->orbitalPeriod = $orbitalPeriod ?? (float) $orbitalPeriod;
    }

    public function setGravity(null | string $gravity): void
    {
        $this->gravity = $gravity ?? trim(string: $gravity);
    }

    public function setPopulation(null | int | string $population): void
    {
        $this->population = $population ?? (int) $population;
    }

    public function setClimate(null | string $climate): void
    {
        $this->climate = $climate ?? trim(string: $climate);
    }

    public function setTerrain(null | string $terrain): void
    {
        $this->terrain = $terrain ?? trim(string: $terrain);
    }

    public function setSurfaceWater(null | string $surfaceWater): void
    {
        $this->surfaceWater = $surfaceWater ?? trim(string: $surfaceWater);
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
