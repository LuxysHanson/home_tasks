<?php
/**
 * @var $menu string
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
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div id="product_list">

        <?= $menu ?>

        <? if ($products) : ?>
            <? foreach ($products as $product) : ?>
                <?php include "product.php" ?>
            <? endforeach; ?>
        <? else: ?>
            <div class="text-danger">Список пуст</div>
        <? endif; ?>

    </div>
</body>
</html>
