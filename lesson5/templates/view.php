<?php
/**
 * @var $title string
 * @var $item Galleries|null
 */

use common\models\Galleries; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Моя галерея - <?= $title ?></title>
    <link rel="stylesheet" href="<?= STYLE_DIR ?>"/>
</head>
<body>
<div id="main">
    <div class="post_title">
        <h2><?= $title ?></h2>
    </div>
    <div class="gallery">
        <? if ($item) : ?>
            <img alt="<?= $item->name ?>" src="<?= 'src/gallery_img/big/' . $item->name ?>" width="150"
                 height="100"/>
            <span><?= $item->views ?></span>
        <? else: ?>
            <p class="red">Нет такого элемента</p>
        <? endif; ?>
    </div>
</div>
</body>
</html>