<?php

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
        $content .= '<a rel="gallery" class="photo" href="'. GALLERY_FILE_DIR . "gallery_img/big/" . $image .'">
                        <img src="'. GALLERY_FILE_DIR . "gallery_img/small/" . $images['smallImages'][$key] .'" width="150" height="100" />
                    </a>';
    }
    $content .= '</div>';
    return $content;
}

function getGalleries() {
    return getGalleryContent([
        'bigImages' => getGalleryImages(GALLERY_FILE_DIR . "gallery_img/big"),
        'smallImages' => getGalleryImages(GALLERY_FILE_DIR . "gallery_img/small")
    ]);
}