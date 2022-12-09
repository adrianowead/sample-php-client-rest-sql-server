<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\BaseCommands;

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

    public function test__get(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetAll(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetFromId(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
