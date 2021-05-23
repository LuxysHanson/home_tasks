<?php

function getUser()
{
    return getOneByQuery("SELECT * FROM users WHERE id = ". getUserId());
}

function getUserId()
{
    return $_SESSION['user_id'] ?: -1;
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