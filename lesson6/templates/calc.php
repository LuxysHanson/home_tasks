<?php
/** @var $menu string */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница - Калькулятор</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div id="main">
    <?= $menu ?>
    <form method="post" action="form.php">
        <input type="text" name="value1" />
        <select name="operation">
            <option value="add">+</option>
            <option value="diff">-</option>
            <option value="multi">*</option>
            <option value="div">/</option>
        </select>
        <input type="text" name="value2" />
        <button type="button" class="btn-form">=</button>
        <input type="text" disabled value="0" class="total_count" />
        <div id="loading" class="d-none">
            <img src="/assets/img/download.gif" alt="loading" />
        </div>
    </form>
</div>

<script src="/assets/scripts/main.js"></script>
</body>
</html>