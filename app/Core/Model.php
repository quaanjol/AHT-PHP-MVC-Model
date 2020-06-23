<?php
namespace AHT\Core;

class Model
{
    public function getProperties()
    {
        return array_keys(get_object_vars($this));
    }

    public function getValues()
    {
        return array_values(get_object_vars($this));
    }
}
?>