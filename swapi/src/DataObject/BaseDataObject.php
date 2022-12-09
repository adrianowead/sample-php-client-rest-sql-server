<?php

namespace SWApi\DataObject;

abstract class BaseDataObject
{
    public function __set($prop, $value)
    {
        if (!property_exists(object_or_class: $this, property: $prop)) {
            dump("A propriedade {$prop} não existe");
        } else {
            $func = "set" . ucfirst(string: strtolower(string: $prop));

            $this->$func($value);
        }
    }

    public function __get($prop)
    {
        if (!property_exists(object_or_class: $this, property: $prop)) {
            dump("A propriedade {$prop} não existe");
        } else {
            return $this->$prop;
        }
    }

    public function fromJson(string $json): BaseDataObject
    {
        $json = str_replace(search: "\n", replace: "", subject: $json);
        $json = stripslashes(string: $json);

        $obj = @json_decode(json: $json, associative: true);

        foreach ($obj as $prop => $value) {
            $this->__set(prop: $prop, value: $value);
        }

        return $this;
    }

    public function fromObject(\stdClass $object): BaseDataObject
    {
        foreach ($object as $prop => $value) {
            $this->__set(prop: $prop, value: $value);
        }

        return $this;
    }

    public function __toString(): string
    {
        $array = $this->toArray();

        return json_encode(value: $array);
    }

    public function toArray(): array
    {
        $data = get_object_vars(object: $this);

        foreach ($data as $k => $v) {
            if ($v instanceof \DateTime) {
                $data[$k] = $v->format(format: 'Y-m-d H:i:s');
            }
        }

        return $data;
    }
}
