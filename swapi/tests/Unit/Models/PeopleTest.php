<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use SWApi\Models\People;

/**
 * Class PeopleTest.
 *
 * @covers \SWApi\Models\People
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

        /** @todo Correctly instantiate tested object to use it. */
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

    public function testSaveIfNotExists(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
