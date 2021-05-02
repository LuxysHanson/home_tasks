<?php

// task1

echo "<h3>Задание №1</h3>";

$a = rand(-10, 10);
$b = rand(-10, 10);

echo "Переменные: а={$a}, b={$b} <br>";

if ($a >= 0 && $b >= 0) {
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

/* Вариант без рекурсии */

echo "Результат(вариант без рекурсии): <br>";

switch ($a) {
    case 1:
        echo "1<br>";
    case 2:
        echo "2<br>";
    case 3:
        echo "3<br>";
    case 4:
        echo "4<br>";
    case 5:
        echo "5<br>";
    case 6:
        echo "6<br>";
    case 7:
        echo "7<br>";
    case 8:
        echo "8<br>";
    case 9:
        echo "9<br>";
    case 10:
        echo "10<br>";
    case 11:
        echo "11<br>";
    case 12:
        echo "12<br>";
    case 13:
        echo "13<br>";
    case 14:
        echo "14<br>";
    case 15:
        echo "15<br>";
}

/* Вариант с рекурсией */

function getValueToMax($value, &$str)
{
    if ($value > MAX_SIZE) {
        return empty($str) ? "между переменной a и " . MAX_SIZE . " нет целочисленных чисел" : 0;
    }

    $str .= $value++ . " ";
    return getValueToMax($value, $str);
}

getValueToMax($a, $str);

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
    return $b == 0 ? "Нельзя делить на 0" : $a / $b;
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
        default:
            $result = "Неверная операция!";
    }
    return $result;
}

echo "Результат сложения: " . mathOperation($a, $b, '+') . "<br>";
echo "Результат вычитания: " . mathOperation($a, $b, '-') . "<br>";
echo "Результат умножения: " . mathOperation($a, $b, '*') . "<br>";
echo "Результат деления: " . mathOperation($a, $b, '/') . "<br>";


// task 5

echo "<h3>Задание №5</h3>";

function renderTemplate($url, $about = '', $contact = '')
{
    ob_start();
    include "$url.php";
    return ob_get_clean();
}
$aboutPage = renderTemplate("templates/about");
$contactPage = renderTemplate("templates/contact");
echo renderTemplate("templates/layout", $aboutPage, $contactPage);


// task 6

echo "<h3>Задание №6</h3>";

$a = rand(1, 5);
$b = rand(-2, 3);

echo "Переменные: а=$a, b=$b <br>";

function power($val, $pow)
{
    switch ($pow) {
        case 0:
            return 1;
        case $pow < 0:
            return $val == 0 ? "Нельзя делить на 0" : 1/$val;
        default:
            return $val * power($val, --$pow);
    }
}
echo "Результат возведения: " . power($a,$b);


// task 7

echo "<h3>Задание №7</h3>";

function multiplier($value, $word1, $word2, $word3)
{
    $module = $value % 10;
    switch ($value) {
        case $module == 1 && ($value<10 || $value>20):
            return $value . $word1;
        case $module > 1 && $module < 5 && ($value<10 || $value>20):
            return $value . $word2;
        default:
            return $value . $word3;
    }
}

echo multiplier(date('H'), 'час', 'часа', 'часов');

function multiplier2($value, $words = array())
{
    $module = $value % 10;
    switch ($value) {
        case $module == 1 && ($value<10 || $value>20):
            return $value . $words[0];
        case $module > 1 && $module < 5 && ($value<10 || $value>20):
            return $value . $words[1];
        default:
            return $value . $words[2];
    }
}

//22 часа 15 минут
//21 час 43 минуты
echo multiplier2(date('i'), [
    'минута',
    'минуты',
    'минут'
]);