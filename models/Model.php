<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\dbSuitable;

abstract class Model implements dbSuitable
{
    abstract protected function getTableName();

    public function getOne($id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `id` = :id";
        $params = [
            ':id' => $id
        ];
        // return Db::getInstance()->queryOne($sql, $params);
        return Db::getInstance()->queryOneObject($sql, $params, get_called_class());
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert(){
        
    }

    public function update(){

    }

    public function delete(){

    }
}
