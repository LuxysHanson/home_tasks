<?php
/** @var $isAuth boolean */
$isAuth = false;
?>
<header>
    <p>Добро пожаловать - <?= $isAuth ? 'admin' : 'Гость' ?>!</p>
</header>
