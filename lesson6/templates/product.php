<?php
/** @var $product array */

const IMG_DIR = "\assets\gallery_img\small\\";
$id = (int) $_GET['id'];
?>

<article id="product_<?= $product['id'] ?>">
    <a href=<?= $id ? 'javascript:void(0)' : "item.php?id=". $product['id'] ?>>
        <h4><?= $product['name'] ?></h4>
        <p><?= $product['description'] ?></p>
        <img src="<?= IMG_DIR . $product['image'] ?>" alt="<?= $product['image'] ?>" />
        <br>
        <span>Цена товара - <?= $product['price'] ?></span><br>
        <button>Купить</button>
    </a>
</article>