<?php

require __DIR__ . "\..\..\..\models\product.php";

$totals = getAllByQuery("SELECT sum(total_count) as count FROM basket GROUP BY product_id, session_id");
$productsCount = getTotalCountProducts($totals);
?>
<nav>
    <a href="/">Каталог товаров</a>
    <a href="basket.php">Корзина товаров (<span id="total_count"><?= $productsCount ?></span>)</a>
</nav>
