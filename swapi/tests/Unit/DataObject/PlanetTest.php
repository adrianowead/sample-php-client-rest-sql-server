<?php

namespace Tests\Unit\DataObject;

use Mockery;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SWApi\DataObject\Planet;
use null;

/**
 * Class PlanetTest.
 *
 * @covers \SWApi\DataObject\Planet
 */
final class PlanetTest extends TestCase
{
    private Planet $planet;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->planet = new Planet();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->planet);
    }

    public function testSetId(): void
    {
        $expected = 42;
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('id');
        $property->setAccessible(true);
        $this->planet->setId($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetName(): void
    {
        $expected = '42';
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('name');
        $property->setAccessible(true);
        $this->planet->setName($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetDiameter(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('diameter');
        $property->setAccessible(true);
        $this->planet->setDiameter($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetRotationPeriod(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('rotationPeriod');
        $property->setAccessible(true);
        $this->planet->setRotationPeriod($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetOrbitalPeriod(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('orbitalPeriod');
        $property->setAccessible(true);
        $this->planet->setOrbitalPeriod($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetGravity(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('gravity');
        $property->setAccessible(true);
        $this->planet->setGravity($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetPopulation(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('population');
        $property->setAccessible(true);
        $this->planet->setPopulation($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetClimate(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('climate');
        $property->setAccessible(true);
        $this->planet->setClimate($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetTerrain(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('terrain');
        $property->setAccessible(true);
        $this->planet->setTerrain($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetSurfaceWater(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('surfaceWater');
        $property->setAccessible(true);
        $this->planet->setSurfaceWater($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetCreated(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('created');
        $property->setAccessible(true);
        $this->planet->setCreated($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }

    public function testSetEdited(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(Planet::class))
            ->getProperty('edited');
        $property->setAccessible(true);
        $this->planet->setEdited($expected);
        $this->assertSame($expected, $property->getValue($this->planet));
    }
}
