<?php

require __DIR__ . "\..\models\db.php";
require __DIR__ . "\..\models\api.php";
require __DIR__ . "\..\models\auth.php";

header( 'Content-Type:application/json');

$login = $_POST['login'];
$password = $_POST['password'];

$errors = [
    'errors' => [
        'login' => '',
        'password' => ''
    ]
];

if (!$login || !$password) {

    if (!$login) {
        $errors['errors']['login'] = "Необходимо заполнить логин";
    }

    if (!$password) {
        $errors['errors']['password'] = "Необходимо заполнить пароль";
    }

    sendReply($errors);
}


if (login($login, $password)) {
    sendReply([
        'result' => 'ok',
        'key' => secretKeyForUser()
    ]);
}

$errors['errors']['password'] = "Неправильно логин или пароль";
sendReply($errors);