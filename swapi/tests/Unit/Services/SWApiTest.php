<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use SWApi\Services\SWApi;

/**
 * Class SWApiTest.
 *
 * @covers \SWApi\Services\SWApi
 */
final class SWApiTest extends TestCase
{
    private SWApi $sWApi;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->sWApi = new SWApi();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->sWApi);
    }

    public function testCall(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
