<?php

namespace SWApi\DataObject;

abstract class BaseDataObject
{
    public function __set($prop, $value)
    {
        if (!property_exists($this, $prop)) {
            dump("A propriedade {$prop} não existe");
        } else {
            $func = "set" . ucfirst(strtolower($prop));

            $this->$func($value);
        }
    }

    public function fromJson(string $json): BaseDataObject
    {
        $json = str_replace("\n", "", $json);
        $json = stripslashes($json);

        $obj = @json_decode($json, true);

        foreach ($obj as $prop => $value) {
            $this->__set($prop, $value);
        }

        return $this;
    }

    public function __toString()
    {
        $array = $this->toArray();

        return json_encode($array);
    }

    public function toArray()
    {
        $array = [];

        foreach (get_class_vars(__CLASS__) as $prop => $value) {
            if (!empty($this->$prop)) {
                $array[$prop] = $this->$prop;
            }
        }
        return $array;
    }
}
