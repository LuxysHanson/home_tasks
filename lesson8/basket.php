<?php

require_once(__DIR__ . "\models\db.php");
require __DIR__ . "\models\auth.php";

$isBasket = true;
$totalCount = getAllByQuery("SELECT p.price, b.total_count FROM basket as b LEFT JOIN products as p ON p.id = b.product_id");
$products = getAllByQuery("SELECT p.*, b.*, g.name as image FROM basket b LEFT JOIN products as p ON p.id = b.product_id LEFT JOIN galleries g ON p.image_id = g.id");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина товаров</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php include "views/header.php" ?>

    <div id="basket_products">

        <?php include "views/menu.php" ?>

        <? if ($products) : ?>
            <? foreach ($products as $product) : ?>
                <?php include "views/product.php" ?>
            <? endforeach; ?>
            <br>
            <p>Общая сумма заказа - <span id="basket_count"><?= getTotalAmountOrder($totalCount) ?></span></p>
        <? else: ?>
            <div class="text-danger">Корзина пуста</div>
        <? endif; ?>

    </div>

    <script src="assets/scripts/basket.js"></script>
</body>
</html>