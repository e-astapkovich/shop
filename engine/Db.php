<?php

namespace app\engine;

use PDO;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3306',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    protected $connection = null;

    public function getConnection()
    {
        if (is_null($this->connection)) {
            // $this->connection = new PDO("mysql:host=localhost;dbname=shop2", 'root', "root");
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
        }
        return $this->connection;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database']
        );
    }

    public function queryOne($sql)
    {
        return $sql . "<br>";
    }

    public function queryAll($sql)
    {
        return $sql . "<br>";
    }
}