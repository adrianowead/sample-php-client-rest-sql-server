<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\Planet;
use SWApi\DataObject\Planet as DataObjectPlanet;

/**
 * Class PlanetTest.
 *
 * @covers \SWApi\Commands\Planet
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

    public function testGetAll(): void
    {
        $list = $this->planet->getAll();

        $this->assertInstanceOf(DataObjectPlanet::class, current($list));
    }

    public function testGetFromId(): void
    {
        $planet = $this->planet->getFromId(id: 1);

        $this->assertInstanceOf(DataObjectPlanet::class, $planet);
    }
}
