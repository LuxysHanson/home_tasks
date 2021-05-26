<?php

require_once(__DIR__ . "\models\db.php");
require_once(__DIR__ . "\models\auth.php");

$id = (int) $_GET['id'];
$status = (int) $_GET['status'];

$order = getOneByQuery("SELECT * FROM orders WHERE id = {$id}");
if ($order) {
    executeSqlQuery("UPDATE orders SET status = {$status} WHERE id = {$id}");
}

header("Location: ". $_SERVER['HTTP_REFERER']);