<?php

function getGalleryImages($url)
{
    $imgDir = scandir($url);
    return empty($imgDir) ? $imgDir : array_splice($imgDir, 2);
}

function getGalleries() {
    return getGalleryImages(GALLERY_FILE_DIR . "gallery_img/big");
}