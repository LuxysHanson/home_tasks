<?php

require_once(__DIR__ . "\models\db.php");
require __DIR__ . "\models\auth.php";

$products = getAllByQuery("SELECT p.*, g.name as image FROM products as p LEFT JOIN galleries as g ON p.image_id = g.id");

include "views/list.php";
