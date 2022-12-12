<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\BaseCommands;
use SWApi\Commands\People;
use SWApi\Commands\Planet;
use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Exceptions\UnreachableApiException;

/**
 * Class BaseCommandsTest.
 *
 * @covers \SWApi\Commands\BaseCommands
 */
final class BaseCommandsTest extends TestCase
{
    private BaseCommands $baseCommands;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->baseCommands = $this->getMockBuilder(BaseCommands::class)
            ->setConstructorArgs([])
            ->getMockForAbstractClass();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->baseCommands);
    }

    public function testGetAll(): void
    {
        $list = (new Planet)->getAll();

        $this->assertInstanceOf(DataObjectPlanet::class, current($list));
    }

    public function testGetFromId(): void
    {
        $planet = (new Planet)->getFromId(id: 1);

        $this->assertInstanceOf(DataObjectPlanet::class, $planet);
    }

    public function testGetFromIvalidId(): void
    {
        $this->expectException(UnreachableApiException::class);

        (new People)->getFromId(id: 99);
    }
}
