<?php

function getDb()
{
    static $db = null;

    if (!$db) {
        require_once( $_SERVER['DOCUMENT_ROOT'] . "/config.php");

        try {
            /** @var $database array */
            $conn = new PDO("mysql:host={$database['root']};dbname={$database['name']}", $database['user'], $database['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        $db = $conn;
    }

    return $db;
}

function getQuery($queryString)
{
    $query = getDb()->prepare($queryString);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    return $query;
}

function getAllByQuery($queryString)
{
    return getQuery($queryString)->fetchAll();
}

function getOneByQuery($queryString)
{
    return getQuery($queryString)->fetch();
}

function executeSqlQuery($queryString, $params = [])
{
    $query = getDb()->prepare($queryString);
    $query->execute($params);
}