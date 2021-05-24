<?php
/** @var $sessionId int */

require __DIR__ . "\..\..\..\models\product.php";

$userId = getUserId();
$totals = getAllByQuery("SELECT sum(total_count) as count FROM basket WHERE session_id = '{$sessionId}' AND user_id = {$userId} GROUP BY product_id");
?>
<nav>
    <a href="/">Каталог товаров</a>
    <a href="basket.php">Корзина товаров (<span id="total_count"><?= getTotalCountProducts($totals) ?></span>)</a>
    <a href="my_orders.php">Мои заказы</a>

    <? if (isAdmin()) : ?>
        <a href="admin.php">Админ панель</a>
    <? endif; ?>

</nav>
