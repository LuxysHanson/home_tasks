<?php

require_once(__DIR__ . "\models\db.php");
require __DIR__ . "\models\auth.php";

if (!isGuest()) {
    header("Location: /");
}


include "views/login/index.php";