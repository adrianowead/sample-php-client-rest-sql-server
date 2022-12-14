<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use SWApi\Services\SWApi;
use Tests\Mock\SWapi\MockApi;

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
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testCallBaseApi(): void
    {
        $content = file_get_contents(__DIR__.'/../../Mock/SWapi/api.json');
        $expected = json_decode(json: $content);

        $this->assertEquals($expected, (new SWApi(MockApi::client(
            status: [200],
            body: [$content]
        )))::call('/'));
    }
}
