<?php

const IMG_DIR = "/assets/gallery_img/small/";

require_once(__DIR__ . "\models\db.php");
require_once(__DIR__ . "\models\auth.php");
require __DIR__ . "\models\order.php";

$sessionId = getSessionId();
$totalSum = getAllByQuery("SELECT p.price, b.total_count FROM basket as b LEFT JOIN products as p ON p.id = b.product_id WHERE session_id = '{$sessionId}'");
$products = getAllByQuery("SELECT p.*, b.*, b.id as basket_id, g.name as image FROM basket b LEFT JOIN products as p ON p.id = b.product_id LEFT JOIN galleries g ON p.image_id = g.id WHERE session_id = '{$sessionId}'");


include "views/basket/index.php";