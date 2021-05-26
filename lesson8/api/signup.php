<?php

require __DIR__ . "\..\models\db.php";
require __DIR__ . "\..\models\api.php";
require __DIR__ . "\..\models\auth.php";
require __DIR__ . "\..\models\user.php";

header( 'Content-Type:application/json');

$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$errors = [
    'errors' => [
        'login' => '',
        'password' => '',
        'confirm_password' => ''
    ]
];

if (!$login || !$password || !$confirm_password) {

    if (!$login) {
        $errors['errors']['login'] = "Необходимо заполнить логин";
    }

    if (!$password) {
        $errors['errors']['password'] = "Необходимо заполнить пароль";
    }

    if (!$confirm_password) {
        $errors['errors']['confirm_password'] = "Необходимо подтвердить пароль еще раз";
    }

    sendReply($errors);
}

if ($password !== $confirm_password) {
    $errors['errors']['confirm_password'] = "Пароли не совпадают!";
    sendReply($errors);
}

$user = getUserByLogin($login);
if ($user) {
    $errors['errors']['login'] = "Такой логин уже существует!";
    sendReply($errors);
}

createUser($login, $password);
$currentUser = getUserByLogin($login);
userAuth($currentUser['id']);
sendReply(array( 'result' => 'ok' ));