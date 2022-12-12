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
        $people = new People;
        $people->id = 1;
        $people->name = 'test';

        $this->assertEquals(1, $people->id);
    }

    public function test__getNotExists(): void
    {
        $this->expectException(InvalidPropertyException::class);

        $people = new People;
        $people->id = 1;
        $people->name = 'test';

        $people->notExistsTest;
    }

    public function testFromJson(): void
    {
        $people = new People;
        $people->fromJson(json: '{"id":1,"name":"test","hair_color":"test"}');

        $this->assertEquals('test', $people->hairColor);
    }

    public function testFromObject(): void
    {
        $people = new People;
        $people->fromObject(object: json_decode('{"id":1,"name":"test","hairColor":"test"}'));

        $this->assertEquals('test', $people->hairColor);
    }

    public function test__toString(): void
    {
        $people = new People;
        $people->id = 1;
        $people->name = 'test';

        $this->assertEquals($people->id, json_decode(json: (string) $people)->id);
    }

    public function testToArray(): void
    {
        $people = new People;
        $people->id = 1;
        $people->name = 'test';
        $people->created = '1987-10-08 05:00:00';

        $this->assertArrayHasKey('id', $people->toArray());
    }
}
