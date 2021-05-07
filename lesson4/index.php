<?php

// task 1

const GALLERY_FILE_DIR = "gallery_files/";
const IMG_DIRECTORY = "gallery_files/gallery_img/";

function getGalleryImages($url)
{
    $imgDir = scandir($url);
    return empty($imgDir) ? $imgDir : array_splice($imgDir, 2);
}

function getGalleryContent($images)
{
    $content = '';
    $content .= '<div class="gallery">';
    foreach ($images['bigImages'] as $key => $image) {
        $content .= '<a rel="gallery" class="photo" href="'. IMG_DIRECTORY . "big/" . $image .'">
                        <img src="'. IMG_DIRECTORY . "small/" . $images['smallImages'][$key] .'" width="150" height="100" />
                    </a>';
    }
    $content .= '</div>';
    return $content;
}

function renderTemplate($url, $attributes = [])
{
    ob_start();
    include "$url.php";
    return ob_get_clean();
}

$content = getGalleryContent([
    'bigImages' => getGalleryImages(IMG_DIRECTORY . "big"),
    'smallImages' => getGalleryImages(IMG_DIRECTORY . "small")
]);
echo renderTemplate(GALLERY_FILE_DIR . "gallery", [
    'title' => 'Моя галерея (вариант 1)',
    'content' => $content
]);