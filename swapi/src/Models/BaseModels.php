<?php

namespace SWApi\Models;

use SWApi\DataObject\BaseDataObject;

abstract class BaseModels
{
    protected $conn;

    public function __construct()
    {
        $host = getenv(name: 'DB_HOST');
        $port = getenv(name: 'DB_PORT');
        $user = getenv(name: 'DB_USER');
        $pass = getenv(name: 'DB_PASS');
        $base = getenv(name: 'DB_BASE');

        $this->conn = new \PDO(
            dsn: "dblib:host={$host}:{$port};dbname={$base}",
            username: $user,
            password: $pass
        );
    }

    public function count(): int
    {
        $sql = "SELECT COUNT(*) AS TOTAL FROM {$this->table}";
        $res = $this->conn->query(statement: $sql);

        return $res->fetchObject()->TOTAL;
    }

    public function alreadyExistsId(int $id): bool
    {
        $sth = $this->conn->prepare(query: "SELECT COUNT(*) AS TOTAL FROM {$this->table} WHERE id = :id");
        $sth->bindParam(param: ':id', var: $id);
        $sth->execute();

        return $sth->fetchObject()->TOTAL > 0;
    }

    public function saveIfNotExists(BaseDataObject $object): void
    {
        if (!$this->alreadyExistsId(id: $object->id)) {
            $list = $object->toArray();

            $sth = $this->conn->prepare(
                query: $this->buildInsertQuery(object: $object)
            );

            foreach ($list as $k => $v) {
                if ($v instanceof BaseDataObject) {
                    $v = $v->id;
                }

                $sth->bindValue(param: ":{$k}", value: $v);
            }

            $sth->execute();
        }
    }

    protected function buildInsertQuery(BaseDataObject $object): string
    {
        $list = $object->toArray();

        $fields = array_keys(array: $list);
        $values =  implode(separator: ',:', array: $fields);

        $fields = implode(separator: ',', array: $fields);

        return <<<SQL
INSERT INTO {$this->table} ({$fields}) VALUES (:{$values})
SQL;
    }

    public function getFromId(int $id): ?BaseDataObject
    {
        $sth = $this->conn->prepare(query: "SELECT * FROM {$this->table} WHERE id = :id");
        $sth->bindParam(param: ':id', var: $id);
        $sth->execute();

        $obj = $sth->fetchObject();

        if($obj instanceof \stdClass) {
            return $this->dataFromObject($obj);
        }

        return null;
    }

    protected abstract function dataFromObject(\stdClass $object): BaseDataObject;
}
