<?php

require __DIR__ . "\..\..\..\models\auth.php";
require __DIR__ . "\..\..\..\models\user.php";

$user = !isGuest() ? getUser() : null;
?>
<header>

    <p>Добро пожаловать - <?= $user ? $user['login'] : 'Гость' ?>!</p>

    <? if (isGuest()) : ?>
        <a href="login.php">Войти в систему</a>
    <? else: ?>
        <a href="logout.php">Выход</a>
    <? endif; ?>

</header>
