<?php

namespace common;

use common\traits\QueryTrait;
use PDO;

require __DIR__ . '\Connection.php';
require __DIR__ . '\traits\QueryTrait.php';

class Query
{
    use QueryTrait;

    protected $modelClass;

    public static $queryString = null;

    public function __construct($modelClass)
    {
        $this->setModelClass($modelClass);
    }

    public function executeSqlQuery(string $sql)
    {
        $conn = $this->getDbConnect();
        $this->execute($conn->prepare($sql));
    }

    public function getModelClass()
    {
        return $this->modelClass;
    }

    public function setModelClass($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function getTableName()
    {
        $class = explode("\\", $this->getModelClass());
        $last_key = sizeof($class) - 1;
        return $class[$last_key];
    }

    public function getQueryString()
    {
        if (is_null(static::$queryString)) {
            static::$queryString = "SELECT * FROM" . " " . $this->getTableName();
        }
        return static::$queryString;
    }

    public function all()
    {
        $query = $this->getQueryBuilder();
        return $query->fetchAll();
    }

    public function one()
    {
        $query = $this->getQueryBuilder();
        return $query->fetch();
    }

    public function getQuery(string $query, array $params = [])
    {
        $conn = $this->getDbConnect();
        $query = $conn->prepare($query);
        if (!empty($params)) {
            foreach ($params as $key => $item) {
                $query->bindParam(":{$key}", $item);
            }
        }
        return $query;
    }

    protected function populate(&$queryString)
    {
        $string = "";
        if ($this->sort) {
            $string .= " ORDER BY " . $this->sort;
        }

        if ($conditions = $this->where) {
            $string .= " WHERE ";
            foreach ($conditions as $attr => $value) {
                $string .= $attr . " = :" . $attr;
            }
        }

        if ($string != "") {
            $queryString .= $string;
        }
    }

    protected function getQueryBuilder()
    {
        $queryString = $this->getQueryString();
        $this->populate($queryString);
        $query = $this->getQuery($queryString, $this->where);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->getModelClass());
        $this->execute($query);
        return $query;
    }

    private function getDbConnect()
    {
        static $connect = null;
        if (is_null($connect)) {
            $conn = new Connection();
            $connect = $conn->getDb();
        }
        return $connect;
    }

}