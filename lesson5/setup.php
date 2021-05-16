<?php

use common\models\Galleries;

const IMG_DIR = "src/gallery_img/big";

require __DIR__ . '\common\models\Galleries.php';

$model = new Galleries();
$galleries = $model->getAll();

if (!$galleries) {

    $images = array_slice(scandir(IMG_DIR), 2);

    if (!$images) {
        die("Нет изображений для добавления");
    }

    $sql = "INSERT INTO galleries(`name`) VALUES " . "('" . implode("'), ('", $images) . "')";
    $model->insert($sql);

    die("Галлерея успешно заполнена!");
}
echo "Галлерея не пустая";