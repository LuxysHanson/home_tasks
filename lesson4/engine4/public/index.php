<?php
//TODO сделать пути абсолютными

//Первым делом подключим файл с константами настроек
include "../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [];
switch ($page) {

    case 'index':
        $params['name'] = 'Админ';
        break;

    case 'catalog':
        $params['catalog'] = getCatalog();
        break;

    case 'files':
        $params['files'] = getFiles();
      //  _log($params, 'params');
        break;

    case 'gallery':
        $params['galleries'] = getGalleries();
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
        break;
}

echo render($page, $params);


