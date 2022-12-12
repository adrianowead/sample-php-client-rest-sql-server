<?php

namespace SWApi\Services;

use SWApi\Exceptions\UnreachableApiException;

final class SWApi
{
    public static function call(string $path, array $params = []): \stdClass
    {  
        $link = getenv('STAR_WARS_API_URI') . $path;

        if (sizeof(value: $params) > 0) {
            $link .= '?' . http_build_query(data: $params);
        }

        dump($link);

        try {
            $data = file_get_contents(filename: $link);
        } catch (\Exception $e) {
            throw new UnreachableApiException("API ({$link}) inacessível");
        }

        return json_decode(json: $data);
    }
}
