<?php

namespace common\models;

use common\DbRecord;

require __DIR__ . '\..\DbRecord.php';

class Galleries extends DbRecord
{

    public function addView()
    {
        $sql = "UPDATE ". $this->getClassName() ." SET views = views + 1 WHERE id = ". $this->id;
        self::find()->executeSqlQuery($sql);
    }

}