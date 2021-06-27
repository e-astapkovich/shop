<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\dbSuitable;

abstract class Model implements dbSuitable
{
    protected $db;

    abstract protected function getTableName();

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE `id` = :id";
        $params = [
            ':id' => $id
        ];
        return $this->db->queryOne($sql, $params);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return $this->db->queryAll($sql);
    }

    public function insert(){
        
    }

    public function update(){

    }

    public function delete(){

    }
}
