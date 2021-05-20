<?php

require_once(__DIR__ . "\db.php");
require __DIR__ . "\auth.php";

$products = getAllByQuery("SELECT p.*, g.name as image FROM products as p LEFT JOIN galleries as g ON p.image_id = g.id");

include "templates/list.php";
