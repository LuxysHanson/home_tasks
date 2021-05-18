<?php
$value1 = $_POST['value1'];
$value2 = $_POST['value2'];
$operation = $_POST['operation'];

function add($a, $b)
{
    return $a + $b;
}

function diff($a, $b)
{
    return $a - $b;
}

function multi($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    return $b == 0 ? "Нельзя делить на 0" : $a / $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    if (function_exists($operation)) {
        return $operation($arg1, $arg2);
    }

    return "Нет такой функции для обработки данных!";
}

$result = mathOperation($value1, $value2, 'add');
return $result;