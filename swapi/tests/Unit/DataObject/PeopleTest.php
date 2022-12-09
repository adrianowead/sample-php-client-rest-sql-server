<?php

namespace Tests\Unit\DataObject;

use Mockery;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SWApi\DataObject\People;
use null;

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
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('height');
        $property->setAccessible(true);
        $this->people->setHeight($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetMass(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('mass');
        $property->setAccessible(true);
        $this->people->setMass($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetHairColor(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('hairColor');
        $property->setAccessible(true);
        $this->people->setHairColor($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetSkinColor(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('skinColor');
        $property->setAccessible(true);
        $this->people->setSkinColor($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetEyeColor(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('eyeColor');
        $property->setAccessible(true);
        $this->people->setEyeColor($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetBirthYear(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('birthYear');
        $property->setAccessible(true);
        $this->people->setBirthYear($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetGender(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('gender');
        $property->setAccessible(true);
        $this->people->setGender($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetHomeworld(): void
    {
        $expected = 42;
        $property = (new ReflectionClass(People::class))
            ->getProperty('homeworld');
        $property->setAccessible(true);
        $this->people->setHomeworld($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetCreated(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('created');
        $property->setAccessible(true);
        $this->people->setCreated($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }

    public function testSetEdited(): void
    {
        $expected = Mockery::mock(null::class);
        $property = (new ReflectionClass(People::class))
            ->getProperty('edited');
        $property->setAccessible(true);
        $this->people->setEdited($expected);
        $this->assertSame($expected, $property->getValue($this->people));
    }
}
