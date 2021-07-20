<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\dbSuitable;

abstract class Model implements dbSuitable
{
    protected $id;
    public $modifiedFields = [];

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->modifiedFields[$name] = $value;
            $this->$name = $value;
        }
    }
}
