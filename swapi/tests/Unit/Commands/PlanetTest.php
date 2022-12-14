<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\Planet;
use SWApi\DataObject\Planet as DataObjectPlanet;
use Tests\Mock\SWapi\MockApi;

/**
 * Class PlanetTest.
 *
 * @covers \SWApi\Commands\Planet
 */
final class PlanetTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testGetAll(): void
    {
        $planet = new Planet(client: MockApi::client(
            status: [200, 200, 200],
            body: [
                file_get_contents(__DIR__.'/../../Mock/SWapi/planets-all.json'),
                file_get_contents(__DIR__.'/../../Mock/SWapi/planet-1.json'),
                file_get_contents(__DIR__.'/../../Mock/SWapi/planet-2.json'),
            ]
        ));

        $this->assertInstanceOf(DataObjectPlanet::class, current($planet->getAll()));
    }

    public function testGetFromId(): void
    {
        $planet = new Planet(client: MockApi::client(
            status: [200],
            body: [
                file_get_contents(__DIR__.'/../../Mock/SWapi/planet-1.json')
            ]
        ));

        $this->assertInstanceOf(DataObjectPlanet::class, $planet->getFromId(id: 1));
    }
}
