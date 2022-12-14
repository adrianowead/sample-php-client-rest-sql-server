<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\People;
use SWApi\DataObject\People as DataObjectPeople;
use SWApi\Exceptions\UnreachableApiException;
use Tests\Mock\SWapi\MockApi;

/**
 * Class PeopleTest.
 *
 * @covers \SWApi\Commands\People
 */
final class PeopleTest extends TestCase
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

    public function testUnreachableException(): void
    {
        $this->expectException(UnreachableApiException::class);

        $people = new People(client: MockApi::client([404], [null]));

        $people->getAll();
    }

    public function testGetAll(): void
    {
        $people = new People(client: MockApi::client(
            status: [200, 200, 200],
            body: [
                file_get_contents(__DIR__.'/../../Mock/SWapi/people-all.json'),
                file_get_contents(__DIR__.'/../../Mock/SWapi/people-1.json'),
                file_get_contents(__DIR__.'/../../Mock/SWapi/people-2.json'),
            ]
        ));

        $this->assertInstanceOf(DataObjectPeople::class, current($people->getAll()));
    }

    public function testGetFromId(): void
    {
        $people = new People(client: MockApi::client(
            status: [200],
            body: [file_get_contents(__DIR__.'/../../Mock/SWapi/people-1.json')]
        ));

        $this->assertInstanceOf(DataObjectPeople::class, $people->getFromId(id: 1));
    }
}
