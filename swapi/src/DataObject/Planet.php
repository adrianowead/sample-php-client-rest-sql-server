<?php

namespace SWApi\DataObject;

final class Planet extends BaseDataObject
{
    protected int $id;
    protected string $name;
    protected ?float $diameter;
    protected ?float $rotation_period;
    protected ?float $orbital_period;
    protected ?string $gravity;
    protected ?int $population;
    protected ?string $climate;
    protected ?string $terrain;
    protected ?string $surface_water;
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

    public function setRotation_period(null | int | float | string $rotation_period): void
    {
        $this->rotation_period = $rotation_period ?? (float) $rotation_period;
    }

    public function setOrbital_period(null | int | float | string $orbital_period): void
    {
        $this->orbital_period = $orbital_period ?? (float) $orbital_period;
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

    public function setSurface_water(null | string $surface_water): void
    {
        $this->surface_water = $surface_water ?? trim(string: $surface_water);
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
