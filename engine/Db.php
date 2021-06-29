<?php

namespace app\engine;

use app\traits\TSingleton;

class Db
{
    use TSingleton;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3306',
        'login' => 'root',
        'password' => 'root',
        'database' => 'shop2',
        'charset' => 'utf8'
    ];
 
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
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
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
        return $this->connection->lastInsertId();
    }

    /**
     * Метод, непосредственно выполняющий запросы к БД.
     */
    private function query($sql, $params = null)
    {
        var_dump($sql);
        // exit();

        $sth = $this->getConnection()->prepare($sql);
        $sth->execute($params);
        return $sth;
    }


    /**
     * Возвращает одну записи из БД в виде ассоциативного массива
     */
    public function queryOne($sql, $params)
    {
        return $this->query($sql, $params)->fetch();
    }

    /**
     * Возвращает одну записи из БД в виде ассоциативного массива
     */
    public function queryOneObject($sql, $params, $className)
    {
        $sth = $this->query($sql, $params);
        $sth->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);
        return $sth->fetch();
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
