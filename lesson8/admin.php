<?php

require_once(__DIR__ . "\models\db.php");
require __DIR__ . "\models\auth.php";
require __DIR__ . "\models\user.php";

if (!isGuest() && !isAdmin()) {
    header("Location: /");
}

$orders = getAllByQuery("SELECT * FROM orders as o RIGHT JOIN order_products as op ON op.order_id = o.id WHERE o.status = 0");

include "views/admin/index.php";