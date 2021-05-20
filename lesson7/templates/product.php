<?php
/**
 * @var $product array
 * @var $isBasket boolean
 */

const IMG_DIR = "\assets\gallery_img\small\\";
$id = (int)$_GET['id'];
?>

<article id="product_<?= $product['id'] ?>">
    <h4><?= $product['name'] ?></h4>
    <p><?= $product['description'] ?></p>
    <img src="<?= IMG_DIR . $product['image'] ?>" alt="<?= $product['image'] ?>"/><br>
    <span>Цена товара - <?= $product['price'] ?></span><br>

    <? if (!$isBasket) : ?>
        <button class="buy-btn" data-id="<?= $product['id'] ?>" data-count="1">Купить</button>
    <? else: ?>
        <p>
            Количество товара -
            <span id="total_count_<?= $product['id'] ?>"><?= $product['total_count'] ?></span>
        </p>
        <br>
        <button class="del-btn" data-id="<?= $product['id'] ?>" data-count="<?= $product['total_count'] ?>"
            data-price="<?= $product['price'] ?>">
            Удалить
        </button>
    <? endif; ?>

    <hr>
</article>