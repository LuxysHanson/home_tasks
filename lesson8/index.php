<?php

const IMG_DIR = "/assets/gallery_img/small/";

require_once(__DIR__ . "\models\db.php");
require_once(__DIR__ . "\models\auth.php");

$sessionId = getSessionId();
$products = getAllByQuery("SELECT p.*, g.name as image FROM products as p LEFT JOIN galleries as g ON p.image_id = g.id");


include "views/catalog/index.php";