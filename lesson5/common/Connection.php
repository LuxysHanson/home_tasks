<?php

namespace common;

use PDO;
use PDOException;

class Connection
{

    protected $db = null;

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

}