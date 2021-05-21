<?php
/**
 * @var $products array
 * @var $totalCount int
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина товаров</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<?php include "views/layouts/blocks/header.php" ?>

<div id="basket_products">

    <?php include "views/layouts/blocks/menu.php" ?>

    <? if ($products) : ?>
        <? foreach ($products as $product) : ?>
            <article id="product_<?= $product['basket_id'] ?>">
                <h4><?= $product['name'] ?></h4>
                <p><?= $product['description'] ?></p>
                <img src="<?= IMG_DIR . $product['image'] ?>" alt="<?= $product['image'] ?>"/><br>
                <span>Цена товара - <?= $product['price'] ?></span><br>
                <p>
                    Количество товара -
                    <span id="total_count_<?= $product['basket_id'] ?>"><?= $product['total_count'] ?></span>
                </p>
                <br>
                <button class="del-btn" data-id="<?= $product['basket_id'] ?>" data-count="<?= $product['total_count'] ?>"
                        data-price="<?= $product['price'] ?>">Удалить
                </button>
                <hr>
            </article>
        <? endforeach; ?>
        <br>
        <p>Общая сумма заказа - <span id="basket_count"><?= $totalCount ?></span></p>
    <? else: ?>
        <div class="text-danger">Корзина пуста</div>
    <? endif; ?>

</div>

<script src="/assets/scripts/basket.js"></script>
</body>
</html>
