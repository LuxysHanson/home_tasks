<?php
/**
 * @var $menu string
 * @var $product array
 */

require __DIR__ . "\db.php";

$id = (int) $_GET['id'];
$product = getOneByQuery("SELECT p.*, g.name as image FROM products as p LEFT JOIN galleries as g ON g.id = p.image_id WHERE p.id = " . $id);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница товара</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div id="product_item">

        <?= $menu ?>

        <? if ($product) : ?>
            <?php include "templates/product.php" ?>
        <? else: ?>
            <div class="text-danger">Такого товара не существует</div>
        <? endif; ?>

    </div>
</body>
</html>