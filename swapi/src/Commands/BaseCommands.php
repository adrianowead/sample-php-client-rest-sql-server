<?php

namespace SWApi\Commands;

abstract class BaseCommands {
    protected string $signature;
    protected string $enpoint;

    public function __get(string $prop): mixed
    {
        $func  = "get" . ucfirst($prop);

        if(method_exists($this, $func)) {
            return $this->$func();
        }

        throw new \Exception("A função '{$func}' não existe.");
    }

    private function getSignature(): string
    {
        $sig = "swapi:{$this->signature}";

        if($sig == 'swapi:')
            throw new \Exception("A assinatura do comando é obrigatória");

        return $sig;
    }

    abstract public function getAll(): array | null;
    abstract public function getFromId(int $id): array;
}