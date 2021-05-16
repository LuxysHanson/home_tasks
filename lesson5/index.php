<?php

use common\models\Galleries;

require __DIR__ . '\common\models\Galleries.php';

$title = "Домашнее задание №5";
$galleries = (new Galleries())->getAll("DESC");


include "templates/list.php";