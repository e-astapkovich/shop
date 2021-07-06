<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
    abstract protected static function getTableName();

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
        $params = [
            ':id' => $id
        ];
        // return Db::getInstance()->queryOne($sql, $params);
        return Db::getInstance()->queryOneObject($sql, $params, get_called_class());
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}`";
        return Db::getInstance()->queryAll($sql);
    }

    public function save() {

        if ($this->id) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function insert() {

        $fields = [];
        $placeholders = [];
        $params = [];

        foreach ($this as $key => $value) {
            if ($key == 'id' or $key == 'modifiedFields') {
                continue;
            }
            $fields[] = "`$key`";
            // $placeholders[] = ":$key";
            $params[":$key"] = (string)$value;
        }
        
        $fieldsString = implode(', ', $fields);
        // $placeholdersString = implode(', ', $placeholders);
        $placeholdersString = implode(', ', array_keys($params));
        $sqlString = "INSERT INTO {$this->getTableName()} ($fieldsString) VALUES ($placeholdersString)";

        Db::getInstance()->execute($sqlString, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return true;
    }

    public function update(){

        // var_dump($this->modifiedFields);

        $setArray = [];
        $params = [':id' => $this->id];

        foreach ($this->modifiedFields as $key => $value) {
            if ($key == 'id') continue;
            $setArray[] = "`$key`" . " = :" . $key;
            $params[":$key"] = $value;
        }

        $this->modifiedFields = [];
        $setString = implode(', ', $setArray);
        $sqlString = "UPDATE {$this->getTableName()} SET $setString WHERE `id`=:id";
        Db::getinstance()->execute($sqlString, $params);

        return true;
    }

    public function delete(){
        $sqlString = "DELETE FROM {$this->getTableName()} WHERE `id` = :id";
        $params = [":id" => $this->id];
        Db::getInstance()->execute($sqlString, $params);
        return true;
    }
}
