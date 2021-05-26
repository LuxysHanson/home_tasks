<?php

require_once(__DIR__ ."/../enums/order_enum.php");

function getTotalAmountOrder($total)
{
    $count = 0;
    if (!empty($total)) {
        foreach ($total as $item) {
            $count += $item['price'] * $item['total_count'];
        }
    }
    return $count;
}

function getIndexedCart($orders)
{
    $data = [];
    if ($orders) {
        foreach ($orders as $item) {
            $data[$item['id']] = $item;
        }
    }
    return $data;
}

function createOrder($sessionId, $userId)
{
    executeSqlQuery("INSERT INTO `orders` (`session_id`, `user_id`, `date`, `status`) VALUES (:session_id, :user_id, :date, :status)", [
        'session_id' => $sessionId,
        'user_id' => $userId,
        'date' => strtotime("now"),
        'status' => STATUS_NEW
    ]);
}

function createOrderProducts($orderId, $productId, $quantity)
{
    executeSqlQuery("INSERT INTO `order_products` (`order_id`, `product_id`, `quantity`) VALUES (:order_id, :product_id, :quantity)", [
        'order_id' => $orderId,
        'product_id' => $productId,
        'quantity' => $quantity
    ]);
}