<?php

namespace Tests\Unit\Commands;

use PHPUnit\Framework\TestCase;
use SWApi\Commands\Planet;

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
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetFromId(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
