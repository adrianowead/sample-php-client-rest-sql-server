<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\People;
use SWApi\DataObject\People as DataObjectPeople;
use SWApi\Exceptions\UnreachableApiException;

/**
 * Class PeopleTest.
 *
 * @covers \SWApi\Commands\People
 */
final class PeopleTest extends TestCase
{
    private People $people;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->people = new People();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->people);
    }

    public function testGetAll(): void
    {
        $this->expectException(UnreachableApiException::class);

        $this->people->getAll();
    }

    public function testGetFromId(): void
    {
        $people = $this->people->getFromId(id: 1);

        $this->assertInstanceOf(DataObjectPeople::class, $people);
    }
}
