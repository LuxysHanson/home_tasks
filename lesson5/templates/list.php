<?php
/**
 * @var $title string
 * @var $galleries Galleries[]|null
 */

use common\models\Galleries; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" href="<?= "src/style.css" ?>"/>
</head>
<body>
<div id="main">
    <div class="post_title">
        <h2><?= $title ?></h2>
    </div>
    <div class="gallery">
        <? if ($galleries) : ?>
            <? foreach ($galleries as $item) : ?>
                <a rel="gallery" class="photo" href="<?= "/gallery.php?id={$item->id}" ?>">
                    <img alt="<?= $item->name ?>" src="<?= 'src/gallery_img/small/' . $item->name ?>" width="150"
                         height="100"/>
                    <span><?= $item->views ?></span>
                </a>
            <? endforeach; ?>
        <? else: ?>
            <p class="red">Галлерея пуста</p>
        <? endif; ?>
    </div>
</div>
</body>
</html>
