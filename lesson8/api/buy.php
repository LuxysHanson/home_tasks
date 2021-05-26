<?php

require __DIR__ . "\..\models\db.php";
require __DIR__ . "\..\models\auth.php";
require __DIR__ . "\..\models\api.php";
require __DIR__ . "\..\models\user.php";

$productId = (int) $_POST['id'];
$productCount = (int) $_POST['count'];
$sessionId = getSessionId();
$userId = getUserId();

$product = getOneByQuery("SELECT * FROM basket WHERE product_id = ". $productId ." AND session_id = '". $sessionId ."' AND user_id = ". $userId);

if ($product) {
    executeSqlQuery("UPDATE basket SET total_count = total_count + :total_count WHERE product_id = :product_id AND session_id = :session_id AND user_id = :user_id", [
        'total_count' => $productCount,
        'product_id' => $productId,
        'session_id' => $sessionId,
        'user_id' => $userId
    ]);
} else {
    executeSqlQuery("INSERT INTO `basket` (`session_id`, `product_id`, `total_count`, `user_id`) VALUES(:session_id, :product_id, :total_count, :user_id)", [
        'session_id' => $sessionId,
        'product_id' => $productId,
        'total_count' => $productCount,
        'user_id' => $userId
    ]);
}


sendReply(array( 'result' => 'ok' ));