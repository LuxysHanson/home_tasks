<?php

session_start();
setcookie('auth', "logout", strtotime('-2 hours'));
session_destroy();
header("Location: /");