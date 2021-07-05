<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\dbSuitable;

abstract class Model implements dbSuitable
{
    private $id;
    public $modifiedFields = [];

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->modifiedFields[$name] = $value;
        $this->$name = $value;
    }
}
