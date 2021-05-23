<?php
/** @var $sessionId int */

require __DIR__ . "\..\..\..\models\product.php";

$totals = getAllByQuery("SELECT sum(total_count) as count FROM basket WHERE session_id = '{$sessionId}' GROUP BY product_id");
?>
<nav>
    <a href="/">Каталог товаров</a>
    <a href="basket.php">Корзина товаров (<span id="total_count"><?= getTotalCountProducts($totals) ?></span>)</a>
</nav>
