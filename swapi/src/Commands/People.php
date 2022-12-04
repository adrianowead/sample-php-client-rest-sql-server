<?php

namespace SWApi\Commands;

final class People extends BaseCommands {

    public function __construct()
    {
        $this->endpoint = $this->signature = 'people';
    }

    public function getAll(): array
    {
        return [];
    }

    public function getFromId(int $id): array
    {
        return [];
    }
}