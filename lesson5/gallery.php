<?php

use common\models\Galleries;

require __DIR__ . '\common\models\Galleries.php';

$id = (int)$_GET['id'];
$model = new Galleries();
$model->addView($id);
$item = $model->getOneById($id);
$title = $item->name;

include "templates/view.php";