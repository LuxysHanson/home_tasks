<?php
/** @var $isAuth boolean */
$isAuth = false;
?>
<header>
    <p>Добро пожаловать - <?= $isAuth ? 'admin' : 'Гость' ?>!</p>
    <a href="login.php">Войти в систему</a>
</header>
