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

        $fields = [];
        $placeholders = [];
        $params = [];
        foreach ($this as $key => $value) {
            if ($key == 'id') {
                continue;
            }
            $fields[] = "`$key`";
            $placeholders[] = ":$key";
            $params[":$key"] = (string)$value;
        }
        var_dump($fields);
        var_dump($placeholders);
        var_dump($params);
        
        $fieldsString = implode(', ', $fields);
        $placeholdersString = implode(', ', $placeholders);
        $sqlString = "INSERT INTO {$this->getTableName()} ($fieldsString) VALUES ($placeholdersString)";
        var_dump($sqlString);
        // exit();

        return Db::getInstance()->execute($sqlString, $params);
        
        // echo "INSERT INTO {$this->getTableName()} ($fieldsString) VALUES ($valuesString)";
    }

    public function update(){

    }

    public function delete(){

    }
}
