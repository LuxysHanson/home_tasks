<?php

require __DIR__ . "\models\db.php";
require __DIR__ . "\models\auth.php";
require __DIR__ . "\models\user.php";
require __DIR__ . "\models\order.php";

if ($postData = $_POST) {

    createOrder(getSessionId(), getUserId());
    $order = getOneByQuery("SELECT * FROM orders ORDER BY id DESC");

    $baskets = getAllByQuery("SELECT * FROM basket");
    $indexedCart = getIndexedCart($baskets);

    foreach ($postData as $attr => $item) {
        if ($basket = $indexedCart[$item]) {
            createOrderProducts($order['id'], $basket['product_id'], $basket['total_count']);

            executeSqlQuery("DELETE FROM basket WHERE id = :id", [
                'id' => $basket['id']
            ]);
        }
    }

    header("Location: /");
}