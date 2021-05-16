<?php

namespace common;

use ReflectionClass;

require __DIR__ . '\Query.php';

/**
 * Базовый класс для подключения к БД
 * Class DbRecord
 */
class DbRecord
{

    public static function find()
    {
        return (new Query(get_called_class()));
    }

    public function getClassName()
    {
        return (new ReflectionClass($this))->getShortName();
    }

}