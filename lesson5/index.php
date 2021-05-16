<?php

use common\models\Galleries;

const STYLE_DIR = "src/style.css";

require __DIR__ . '\common\models\Galleries.php';

$title = "Домашнее задание №5";
$galleries =  Galleries::find()->orderBy("views DESC")->all();


include "templates/list.php";