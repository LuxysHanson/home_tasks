<?php
?>

<div id="main">
    <div class="post_title">
        <h2><?= $title ?></h2>
    </div>
    <div class="gallery">
        <? foreach ($galleries as $item) : ?>
            <a rel="gallery" class="photo" href="<?= GALLERY_FILE_DIR . 'gallery_img/big/' . $item ?>">
                <img src="<?= GALLERY_FILE_DIR . 'gallery_img/small/' . $item ?>" width="150" height="100"/>
            </a>
        <? endforeach; ?>
    </div>
</div>