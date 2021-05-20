<?php
$total = getAllByQuery("SELECT sum(total_count) as count FROM basket GROUP BY product_id, session_id");
?>
<nav>
    <a href="/">Каталог товаров</a>
    <a href="basket.php">Корзина товаров (<span id="total_count"><?= getTotalCountProducts($total) ?></span>)</a>
</nav>
