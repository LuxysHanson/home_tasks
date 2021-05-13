<?php

namespace common;

use PDO;
use PDOException;
use ReflectionClass;

/**
 * Базовый класс для подключения к БД
 * Class DbRecord
 */
class DbRecord
{
    protected $db = null;

    public static $queryString = null;

    public function __construct()
    {
        require_once( $_SERVER['DOCUMENT_ROOT'] . "/config.php");

        try {
            /** @var $database array */
            $conn = new PDO("mysql:host={$database['root']};dbname={$database['name']}", $database['user'], $database['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

        $this->setDb($conn);
    }

    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getClassName()
    {
        return (new ReflectionClass($this))->getShortName();
    }

   /* public function getAllByQuery(string $query)
    {
        $query = $this->getDb()->query($query);
        return $query->fetchAll(PDO::FETCH_CLASS);
    }*/

    public function insert(string $query)
    {
        return $this->getDb()->prepare($query)->execute();
    }

}