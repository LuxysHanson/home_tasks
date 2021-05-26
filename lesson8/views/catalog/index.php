<?php
/**
 * @var $products array
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<?php include "views/layouts/blocks/header.php" ?>

<div id="product_list">

    <?php include "views/layouts/blocks/menu.php" ?>

    <? if ($products) : ?>
        <? foreach ($products as $product) : ?>
            <article id="product_<?= $product['id'] ?>">
                <h4><?= $product['name'] ?></h4>
                <p><?= $product['description'] ?></p>
                <img src="<?= IMG_DIR . $product['image'] ?>" alt="<?= $product['image'] ?>"/><br>
                <span>Цена товара - <?= $product['price'] ?></span><br>
                <button class="buy-btn" data-id="<?= $product['id'] ?>" data-count="1">Купить</button>
                <hr>
            </article>
        <? endforeach; ?>
    <? else: ?>
        <div class="text-danger">Список пуст</div>
    <? endif; ?>

</div>

<script src="/assets/scripts/basket.js"></script>
</body>
</html>