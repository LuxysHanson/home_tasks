<?php

function getDb()
{
    require_once( $_SERVER['DOCUMENT_ROOT'] . "/config.php");

    try {
        /** @var $database array */
        $conn = new PDO("mysql:host={$database['root']};dbname={$database['name']}", $database['user'], $database['password']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    return $conn;
}

function getQuery($queryString)
{
    $query = getDb()->prepare($queryString);
    $query->execute();
    return $query;
}

function getAllByQuery($queryString)
{
    return getQuery($queryString)->fetchAll(PDO::FETCH_ASSOC);
}

function getOneByQuery($queryString)
{
    return getQuery($queryString)->fetch(PDO::FETCH_ASSOC);
}