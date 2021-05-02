<?php
$variables = [
    'title' => "Введение в PHP - 1 Урок",
    'heading' => "Домашнее задание - 4 задача",
    'date' => date('d.m.Y')
];

$content = file_get_contents("site.html");

preg_match_all("/{([\s\S]+?)}/", $content, $matches);

if ($matches[0]) {
    $content = str_ireplace($matches[0], $variables, $content);
}

echo $content;
