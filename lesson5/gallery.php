<?php

use common\models\Galleries;

const STYLE_DIR = "src/style.css";

require __DIR__ . '\common\models\Galleries.php';

$item = Galleries::find()->onCondition([
    'id' => (int) $_GET['id']
])->one();

if (!$item) die("Нет такого элемента");

$item->addView();
$title = $item->name;

include "templates/view.php";