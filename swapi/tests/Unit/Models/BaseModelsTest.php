<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use SWApi\Models\BaseModels;

/**
 * Class BaseModelsTest.
 *
 * @covers \SWApi\Models\BaseModels
 */
final class BaseModelsTest extends TestCase
{
    private BaseModels $baseModels;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->baseModels = $this->getMockBuilder(BaseModels::class)
            ->setConstructorArgs([])
            ->getMockForAbstractClass();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->baseModels);
    }

    public function testCount(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testAlreadyExistsId(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testSaveIfNotExists(): void
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
