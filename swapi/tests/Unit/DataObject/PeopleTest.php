<?php

namespace Tests\Unit\DataObject;

use ReflectionClass;
use SWApi\DataObject\People;
use PHPUnit\Framework\TestCase;

/**
 * Class PeopleTest.
 *
 * @covers \SWApi\DataObject\People
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

    public function testSetId(): void
    {
        $expected = 42;
        $property = (new ReflectionClass(People::class))
            ->getProperty('id');
        $property->setAccessible(true);
        $this->people->setId($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetName(): void
    {
        $expected = '42';
        $property = (new ReflectionClass(People::class))
            ->getProperty('name');
        $property->setAccessible(true);
        $this->people->setName($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetHeight(): void
    {
        $expected = null;
        $property = (new ReflectionClass(People::class))
            ->getProperty('height');
        $property->setAccessible(true);
        $this->people->setHeight($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetMass(): void
    {
        $expected = 0.0;
        $property = (new ReflectionClass(People::class))
            ->getProperty('mass');
        $property->setAccessible(true);
        $this->people->setMass($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetHairColor(): void
    {
        $expected = null;
        $property = (new ReflectionClass(People::class))
            ->getProperty('hairColor');
        $property->setAccessible(true);
        $this->people->setHairColor($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetSkinColor(): void
    {
        $expected = null;
        $property = (new ReflectionClass(People::class))
            ->getProperty('skinColor');
        $property->setAccessible(true);
        $this->people->setSkinColor($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetEyeColor(): void
    {
        $expected = null;
        $property = (new ReflectionClass(People::class))
            ->getProperty('eyeColor');
        $property->setAccessible(true);
        $this->people->setEyeColor($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetBirthYear(): void
    {
        $expected = null;
        $property = (new ReflectionClass(People::class))
            ->getProperty('birthYear');
        $property->setAccessible(true);
        $this->people->setBirthYear($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetGender(): void
    {
        $expected = null;
        $property = (new ReflectionClass(People::class))
            ->getProperty('gender');
        $property->setAccessible(true);
        $this->people->setGender($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetCreated(): void
    {
        $expected = 'DateTime';
        $property = (new ReflectionClass(People::class))
            ->getProperty('created');
        $property->setAccessible(true);
        $this->people->setCreated('1979-10-12 08:10:00');
        $this->assertInstanceOf($expected, $property->getValue($this->people));
    }

    public function testSetEdited(): void
    {
        $expected = 'DateTime';
        $property = (new ReflectionClass(People::class))
            ->getProperty('edited');
        $property->setAccessible(true);
        $this->people->setEdited('1979-10-12 08:10:00');
        $this->assertInstanceOf($expected, $property->getValue($this->people));
    }
}
