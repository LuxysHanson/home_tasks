<?php

require __DIR__ . "\db.php";

$menu = file_get_contents("templates/menu.php");
$products = getAllByQuery("SELECT p.*, g.name as image FROM products as p LEFT JOIN galleries as g ON p.image_id = g.id");

include "templates/list.php";
