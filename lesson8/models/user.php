<?php

function getUser()
{
    return getOneByQuery("SELECT * FROM users WHERE id = ". getUserId());
}

function getUserId()
{
    return !isGuest() ? $_SESSION['user_id'] : -1;
}

function isAdmin()
{
    static $user = null;
    if (!$user) {
        $user = getUser();
    }

    return !is_null($user) ? $user['role'] == 'admin' : false;
}

function getUserByLogin($login)
{
    return getOneByQuery("SELECT * FROM users WHERE login = '". trim(strip_tags($login)) ."'");
}

function createUser($login, $password)
{
    executeSqlQuery("INSERT INTO `users` (`login`, `password_hash`, `role`) VALUES (:login, :password_hash, :role)", [
        'login' => strip_tags($login),
        'password_hash' => generatePasswordHash($password),
        'role' => 'user'
    ]);
}