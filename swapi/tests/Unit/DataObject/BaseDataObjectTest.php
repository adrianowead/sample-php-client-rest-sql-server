<?php

namespace Tests\Unit\DataObject;

use PHPUnit\Framework\TestCase;
use SWApi\DataObject\BaseDataObject;
use SWApi\DataObject\People;
use SWApi\Exceptions\InvalidPropertyException;

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
        $people = new People;
        $people->id = 1;
        $people->name = 'test';

        $this->assertEquals(1, $people->id);
    }

    public function test__setNotExists(): void
    {
        $this->expectException(InvalidPropertyException::class);

        $people = new People;
        $people->id = 1;
        $people->name = 'test';
        $people->notExistsTest = null;
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
