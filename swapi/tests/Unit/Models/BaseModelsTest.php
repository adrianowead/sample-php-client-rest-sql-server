<?php

namespace Tests\Unit\Models;

use Mockery;
use PHPUnit\Framework\TestCase;
use SWApi\Models\BaseModels;
use SWApi\Models\People;

/**
 * Class BaseModelsTest.
 *
 * @covers \SWApi\Models\BaseModels
 */
final class BaseModelsTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testCount(): void
    {
        $expected = new \stdClass;
        $expected->TOTAL = 0;

        $mockPdo = Mockery::mock(\PDO::class);
        $mockStmt = Mockery::mock(\PDOStatement::class);

        $mockStmt->shouldReceive('fetchObject')
            ->andReturn($expected)
            ->once();
        
        $mockPdo->shouldReceive('query')
            ->andReturn($mockStmt)
            ->once();

        $test = new People(pdo: $mockPdo);

        // Assert.
        $this->assertEquals($expected->TOTAL, $test->count());
    }

    public function testAlreadyExistsId(): void
    {
        // Create test doubles.
        $mockPdo = $this->createMock(\PDO::class);
        $mockStmt = $this->createMock(\PDOStatement::class);

        $mockStmt->expects($this->exactly(1))
            ->method('bindParam')
            ->willReturn($expected);

        $mockPdo->expects($this->any())
            ->method('prepare')
            ->willReturn($mockStmt);

        $test = new People(pdo: $mockPdo);

        // Assert.
        $this->assertEquals(false, $test->alreadyExistsId(id: 1));
    }

    public function testSaveIfNotExists(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetFromId(): void
    {
        // Create test doubles.
        $mock = $this->createMock(BaseModels::class);

        $mock->expects($this->exactly(1))
            ->method('getFromId')
            ->with(1)
            ->willReturn(null);

        // Assert.
        $this->assertEquals(null, $mock->getFromId(id: 1));
    }
}
