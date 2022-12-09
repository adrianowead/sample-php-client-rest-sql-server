<?php

namespace Tests\Unit\DataObject;

use PHPUnit\Framework\TestCase;
use SWApi\DataObject\BaseDataObject;

/**
 * Class BaseDataObjectTest.
 *
 * @covers \SWApi\DataObject\BaseDataObject
 */
final class BaseDataObjectTest extends TestCase
{
    private BaseDataObject $baseDataObject;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->baseDataObject = $this->getMockBuilder(BaseDataObject::class)
            ->setConstructorArgs([])
            ->getMockForAbstractClass();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->baseDataObject);
    }

    public function test__set(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function test__get(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testFromJson(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testFromObject(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function test__toString(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testToArray(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
