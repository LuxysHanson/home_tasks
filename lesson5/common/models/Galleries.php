<?php

namespace common\models;

use common\DbRecord;
use PDO;

require __DIR__ . '\..\DbRecord.php';

class Galleries extends DbRecord
{

    public static $queryString = "SELECT * FROM galleries";

    public function getAll($orderBy = "ASC")
    {
        $query = $this->getDb()->query(static::$queryString . " ORDER BY views {$orderBy}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function getOneById($id)
    {
        $queryString = static::$queryString . " WHERE id = :id";
        $query = $this->getDb()->prepare($queryString);
        $query->bindParam(":id", $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addView($id)
    {
        $sql = "UPDATE {$this->getClassName()} SET views = views + 1 WHERE id=:id";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(":id", $id);
        $query->execute();
    }

}