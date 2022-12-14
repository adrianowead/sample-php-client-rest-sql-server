<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\People;
use SWApi\Commands\Planet;
use SWApi\DataObject\People as DataObjectPeople;
use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Exceptions\UnreachableApiException;
use Tests\Mock\SWapi\MockApi;

/**
 * Class BaseCommandsTest.
 *
 * @covers \SWApi\Commands\BaseCommands
 */
final class BaseCommandsTest extends TestCase
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
        $people = new People(client: MockApi::client(
            status: [200, 200, 404],
            body: [
                file_get_contents(__DIR__.'/../../Mock/SWapi/people-all.json'),
                file_get_contents(__DIR__.'/../../Mock/SWapi/people-1.json'),
                null,
            ]
        ));

        $this->assertInstanceOf(DataObjectPeople::class, current($people->getAll()));
    }

    public function testGetFromId(): void
    {
        $planet = new Planet(client: MockApi::client(
            status: [200],
            body: [file_get_contents(__DIR__.'/../../Mock/SWapi/planet-1.json')]
        ));

        $this->assertInstanceOf(DataObjectPlanet::class, $planet->getFromId(id: 1));
    }

    public function testGetFromIvalidId(): void
    {
        $this->expectException(UnreachableApiException::class);

        $people = new People(client: MockApi::client([404], [null]));

        $people->getFromId(id: 99);
    }
}
