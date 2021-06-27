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
        'database' => 'shop2',
        'charset' => 'utf8'
    ];
    
    /**
     * Реализация паттерна Singleton
     */
    static private $instance = null;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    static public function getinstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
    /* Реализация паттерна Singleton */

    protected $connection = null;

    private function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
        }
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->connection;
    }

    private function prepareDsnString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database']
        );
    }

    public function lastInsertId()
    {
        //TODO: Вернуть id
    }

    /**
     * Метод, непосредственно выполняющий запросы к БД.
     */
    private function query($sql, $params = null)
    {
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute($params);
        return $sth;
    }


    /**
     * Возвращает одну записи из БД
     */
    public function queryOne($sql, $params = null)
    {
        return $this->query($sql, $params)->fetch();
    }

    /**
     * Возвращает несколько записей из БД
     */
    public function queryAll($sql, $params = null)
    {
        return $this->query($sql, $params)->fetchAll();
    }

    /**
     * Выполняет запрос, и возвращает колчичество затронутых строк
     */
    public function execute($sql, $params = null)
    {
        return $this->query($sql, $params)->rowCount();
    }
}
