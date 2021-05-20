<?php

require __DIR__ . "\..\models\db.php";
require __DIR__ . "\..\models\auth.php";

$productId = (int) $_POST['id'];
$productCount = (int) $_POST['count'];
$sessionId = getSessionId();

$product = getOneByQuery("SELECT * FROM basket WHERE product_id = ". $productId ." AND session_id = '". $sessionId ."'");

if ($product) {
    executeSqlQuery("UPDATE basket SET total_count = total_count + :total_count WHERE product_id = :product_id AND session_id = :session_id", [
        'total_count' => $productCount,
        'product_id' => $productId,
        'session_id' => $sessionId
    ]);
} else {
    executeSqlQuery("INSERT INTO `basket` (`session_id`, `product_id`, `total_count`) VALUES(:session_id, :product_id, :total_count)", [
        'session_id' => $sessionId,
        'product_id' => $productId,
        'total_count' => $productCount
    ]);
}


echo json_encode(array( 'result' => 'ok' ));
return;