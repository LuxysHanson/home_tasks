<?php

function render($page, $params = []) {
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params),
        'styles' => renderTemplate('styles', $params),
        'scripts' => renderTemplate('scripts', $params),
        'body_class' => $params['body_class']
    ]);
}



//$params = ['menu' => '<a></a>', 'content' => '...', $name = 'Alex'];
function renderTemplate($page, $params = []) {
    ob_start();

    extract($params);

//    foreach ($params as $key => $value) {
//        $$key = $value;
//    }

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("404");
    }


    return ob_get_clean();
}