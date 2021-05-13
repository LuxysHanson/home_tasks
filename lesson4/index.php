<?php

// task 1

const GALLERY_FILE_DIR = "gallery_files/";
const IMG_DIRECTORY = "gallery_files/gallery_img/";

function getGalleryImages($url)
{
    $imgDir = scandir($url);
    return empty($imgDir) ? $imgDir : array_splice($imgDir, 2);
}

function renderTemplate($url, $attributes = [])
{
    ob_start();
    include "$url.php";
    return ob_get_clean();
}

echo renderTemplate(GALLERY_FILE_DIR . "gallery", [
    'title' => 'Моя галерея (вариант 1)',
    'galleries' => getGalleryImages(IMG_DIRECTORY . "big")
]);