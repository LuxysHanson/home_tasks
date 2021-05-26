<?php

require __DIR__ . "\..\models\db.php";
require __DIR__ . "\..\models\auth.php";
require __DIR__ . "\..\models\api.php";

$basketId = (int) $_POST['id'];
$productCount = (int) $_POST['count'];
$differenceCount = (int) $_POST['diff_count'];

if ($differenceCount > 0) {
    executeSqlQuery("UPDATE basket SET total_count = total_count - :total_count WHERE id = :id", [
        'total_count' => $productCount,
        'id' => $basketId,
    ]);
} else {
    executeSqlQuery("DELETE FROM basket WHERE id = :id", [ 'id' => $basketId ]);
}


sendReply(array( 'result' => 'ok' ));