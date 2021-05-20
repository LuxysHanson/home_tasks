<?php

require __DIR__ . "\..\models\db.php";
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

$user = getOneByQuery("SELECT * FROM users WHERE login = '". trim(strip_tags($login)) ."'");
if ($user AND password_verify($password, $user['password_hash'])) {

}

$errors['errors']['password'] = "Неправильно логин или пароль";
sendReply($errors);