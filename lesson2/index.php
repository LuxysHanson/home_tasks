<?php

use Cassandra\Exception\DivideByZeroException;


// task1

echo "<h3>Задание №1</h3>";

$a = rand(-10, 10);
$b = rand(-10, 10);

echo "Переменные: а=$a, b=$b <br>";

if ($a > 0 && $b > 0) {
    echo "Разность: ". ($a - $b);
} elseif ($a < 0 && $b < 0) {
    echo "Произведение: ". ($a * $b);
} else {
    echo "Сумма: ". ($a + $b);
}


// task2

echo "<h3>Задание №2</h3>";

const MAX_SIZE = 15;
$a = rand(0, MAX_SIZE);
$str = "";

echo "Переменная а=$a <br>";

/* Вариант с рекурсией */

function getValueToMax($value, &$str)
{
    if ($value >= MAX_SIZE) {
        if (empty($str)) {
            $str = "между переменной a и " . MAX_SIZE . " нет целочисленных чисел";
        }

        return 0;
    }

    $str .= $value++ . " ";
    return getValueToMax($value, $str);
}

getValueToMax(++$a, $str);

echo "Результат(вариант с рекурсией): " . $str;


// task 3

echo "<h3>Задание №3</h3>";

$a = rand(1, 20);
$b = rand(0, 5);

echo "Переменные: а=$a, b=$b <br>";

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
    if ($b == 0) {
//        throw new DivideByZeroException("Нельзя делить на 0");
        return "Нельзя делить на 0";
    }
    return round($a / $b, 2);
}

echo "Результат сложения: " . add($a, $b) . "<br>";
echo "Результат вычитания: " . diff($a, $b) . "<br>";
echo "Результат умножения: " . multi($a, $b) . "<br>";
echo "Результат деления: " . div($a, $b) . "<br>";


// task 4

echo "<h3>Задание №4</h3>";

echo "Переменные: а=$a, b=$b <br>";

function mathOperation($arg1, $arg2, $operation)
{
    $result = null;
    switch ($operation) {
        case '+':
            $result = add($arg1, $arg2);
            break;
        case '-':
            $result = diff($arg1, $arg2);
            break;
        case '*':
            $result = multi($arg1, $arg2);
            break;
        case '/':
            $result = div($arg1, $arg2);
            break;
    }
    return $result;
}

echo "Результат сложения: " . mathOperation($a, $b, '+') . "<br>";
echo "Результат вычитания: " . mathOperation($a, $b, '-') . "<br>";
echo "Результат умножения: " . mathOperation($a, $b, '*') . "<br>";
echo "Результат деления: " . mathOperation($a, $b, '/') . "<br>";


// task 5

echo "<h3>Задание №5</h3>";

function renderTemplate($url, $content = '')
{
    ob_start();
    include "$url.php";
    if ($content) {
        var_dump(ob_get_clean());
        return null;
    }
    return ob_get_clean();
}
$aboutPage = renderTemplate("templates/about");
$contactPage = renderTemplate("templates/contact");
$content = $aboutPage . "<br>" . $contactPage;
echo renderTemplate("templates/layout", $content);


// task 6

echo "<h3>Задание №6</h3>";

$a = rand(1, 5);
$b = rand(-2, 3);

echo "Переменные: а=$a, b=$b <br>";

function power($val, $pow)
{
    if ($pow == 0 || $pow < 0) return 1;
    return $val * power($val, --$pow);
}
echo "Результат возведения: " . power($a,$b);


// task 7

echo "<h3>Задание №7</h3>";

function multiplier($value, $words = array())
{
    if ($value % 10 == 1 && ($value<10 || $value>20)) {
        return $value . $words[0];
    } else if ($value % 10 > 1 && $value % 10 < 5 && ($value<10 || $value>20)) {
        return $value . $words[1];
    } else {
        return $value . $words[2];
    }
}

//22 часа 15 минут
//21 час 43 минуты
echo multiplier(date('H'), [
    'час',
    'часа',
    'часов'
]);
echo multiplier(date('i'), [
    'минута',
    'минуты',
    'минут'
]);