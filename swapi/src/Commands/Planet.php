<?php

namespace SWApi\Commands;

final class Planet extends BaseCommands {

    public function __construct()
    {
        $this->endpoint = $this->signature = 'planets';
    }
}