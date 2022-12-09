<?php

namespace SWApi\Services;

final class SWApi
{
    protected static string $uri = 'https://www.swapi.tech/api';

    public static function call(string $path, array $params = []): \stdClass
    {
        if (sizeof(value: $params) > 0) {
            $link = self::$uri . $path . '?' . http_build_query(data: $params);
        } else {
            self::$uri . $path;
        }

        dump($link);

        $data = file_get_contents(filename: $link);

        return json_decode(json: $data);
    }
}
