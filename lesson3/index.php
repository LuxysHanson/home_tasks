<?php

// task 1

echo "<h3>Задание №1</h3>";

$i = 0;
const MAX_SIZE = 100;

while ($i <= MAX_SIZE) {

    if ($i % 3 === 0) {
        echo $i . " ";
    }

    $i++;
}


// task 2

echo "<h3>Задание №2</h3>";

$i = 0;
const MAX_SIZE_TASK2 = 10;

do {

    switch ($i) {
        case 0:
            echo $i++ . " - ноль<br>";
            break;
        case !($i & 1):
            echo $i++ . " - четное число<br>";
            break;
        default:
            echo $i++ . " - нечетное число<br>";
    }

} while ($i <= MAX_SIZE_TASK2);


// task 3

echo "<h3>Задание №3</h3>";

$cities = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань',
        'Сасово',
        'Скопин',
        'Касимов'
    ]
];

foreach ($cities as $region => $item) {
    echo $region . ":<br>";
    foreach ($item as $key => $city) {
//        echo array_key_last($item) == $key ? $city . ".<br>" : $city . ", ";
        // OR
        echo (sizeof($item) - 1) == $key ? $city . ".<br>" : $city . ", ";
    }
}


// task 4

echo "<h3>Задание №4</h3>";

function translate($text){
    $alphabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
    ];
    $arr = preg_split('//u', mb_strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
    $text = '';
    foreach($arr as $val) {
        $text .= (isset($alphabet[$val])) ? $alphabet[$val] : $val;
    }
    return $text;
}
echo translate("Добро пожаловать!");


// task 5

echo "<h3>Задание №5</h3>";

function replacingSpaces($text)
{
    return str_ireplace('-', '_', $text);
}
echo replacingSpaces('Хороший-день-сегодня!');


// task 6

echo "<h3>Задание №6</h3>";

$menus = [
    [
        'label' => 'Меню1',
        'link' => '#',
        'menu' => [
            [
                'label' => 'Подменю1',
                'link' => '#'
            ],
            [
                'label' => 'Подменю2',
                'link' => '#'
            ],
        ]
    ],
    [
        'label' => 'Меню2',
        'link' => '#'
    ],
    [
        'label' => 'Меню3',
        'link' => '#',
        'menu' => [
            [
                'label' => 'Подменю1',
                'link' => '#',
                'menu' => [
                    [
                        'label' => 'Подподменю1',
                        'link' => '#'
                    ]
                ]
            ]
        ]
    ],
    [
        'label' => 'Меню4',
        'link' => '#'
    ]
];
?>

<?= "Вариант №1:" ?><br>

<ul>
    <?php foreach ($menus as $menu) : ?>
	    <li><a href='<?= $menu['link'] ?>'><?= $menu['label'] ?></a></li>
    <?php endforeach; ?>
</ul>

<?= "Вариант №2:" ?><br>

<?php
function menuOutput($menus)
{
    $menu = "";
    $menu .= "<ul>";
        foreach ($menus as $item) {
            $menu .= "<li><a href='{$item['href']}'>{$item['label']}</a></li>";
            if (isset($item["menu"])) {
                $menu .= menuOutput($item["menu"]);
            }
        }
    $menu .= "</ul>";
    return $menu;
}
echo menuOutput($menus);


// task 7

echo "<h3>Задание №7</h3>";

for ($i = 0; $i <= 9; print $i++) {}


// task 8

echo "<h3>Задание №8</h3>";

foreach ($cities as $region => $item) {
    echo $region . ":<br>";
    $item = array_filter($item, function ($c) {
        $word = mb_substr($c, 0, 1);
        return mb_strtolower($word) == "к";
    });
    foreach ($item as $key => $city) {
        echo array_key_last($item) ? $city . ".<br>" : $city . ", ";
    }
}


// task 9

echo "<h3>Задание №9</h3>";

function urlTranslit($url)
{
    return replacingSpaces(translate($url));
}
echo urlTranslit("вася-ты-лучший.ру");