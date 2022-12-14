<?php

namespace SWApi\Services;

use GuzzleHttp\Client;
use SWApi\Exceptions\UnreachableApiException;
use SWApi\Exceptions\UnsuccessefulApiException;
use SWApi\Exceptions\UnreadableApiException;

final class SWApi
{
    private static ?Client $client = null;

    public function __construct(?Client $client = null)
    {
        self::$client = $client;
    }

    public static function call(string $path, array $params = []): \stdClass
    {
        if(!self::$client) {
            self::$client = new Client([
                'base_uri' => getenv('STAR_WARS_API_URI'),
                'timeout' => 5.0,
            ]);
        }

        try {
            $data = self::$client->get(
                uri: ltrim($path, '/'),
                options: [
                    'query' => $params,
                ]
            );
        } catch(\Exception $e) {
            throw new UnreachableApiException("API ({$path}) inacessível. " . $e->getMessage());
        }

        if($data->getStatusCode() != 200) {
            throw new UnsuccessefulApiException("API ({$path}) retorno ({$data->getStatusCode()}) inesperado. " . $e->getMessage());
        }

        $data = json_decode(json: $data->getBody());

        if(!$data) {
            throw new UnreadableApiException("API ({$path}) retorno ilegível para JSON");
        }

        return $data;
    }
}
