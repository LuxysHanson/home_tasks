<?php

require_once(__DIR__ . "\models\db.php");
require_once(__DIR__ . "\models\auth.php");
require __DIR__ . "\models\user.php";

$sessionId = getSessionId();
if (isGuest()) {
    $orders = getAllByQuery("SELECT * FROM orders as o RIGHT JOIN order_products as op ON op.order_id = o.id WHERE session_id = '". getSessionId() ."'");
} else {
    $orders = getAllByQuery("SELECT * FROM orders as o RIGHT JOIN order_products as op ON op.order_id = o.id WHERE user_id = ". getUserId());
}


include "views/order/index.php";