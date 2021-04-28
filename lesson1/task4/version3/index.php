<?php
$title = "Введение в PHP - 1 Урок";
$heading = "Домашнее задание - 4 задача";
$date = date('d.m.Y');


$content = file_get_contents("site.html");

$str = str_replace("{{ TITLE }}", $title, $content);
$str = str_replace("{{ HEADING }}", $heading, $content);
$str = str_replace("{{ DATE }}", $date, $content);

echo $str;