<?php

require_once(__DIR__ . "\models\db.php");
require __DIR__ . "\models\auth.php";

if (isGuest()) {
    header("Location: /");
}

session_start();
setcookie('auth', "", strtotime('-2 hours'));
session_regenerate_id();
session_destroy();
header("Location: /");