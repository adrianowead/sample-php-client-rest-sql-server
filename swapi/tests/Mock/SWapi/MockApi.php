<?php

namespace Tests\Mock\SWapi;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

final class MockApi {
    public static function client(array $status, array $body): Client
    {
        if(count($status) < count($body)) {
            throw new \Exception("A quantidade de status deve ser igual a quantidade de conteúdos");
        }

        $mock = new MockHandler;

        foreach($status as $k => $s) {
            $mock->append(new Response($s, [], $body[$k]));
        }

        $handler = HandlerStack::create($mock);

        return new Client([
            'handler' => $handler,
            'base_uri' => 'http://mock.fake.star-wars.com/api'
        ]);
    }
}