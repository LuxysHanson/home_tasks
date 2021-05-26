<?php

require_once("generate.php");

function getSessionId()
{
    session_start();
    return session_id();
}

function login($login, $password)
{
    $user = getOneByQuery("SELECT * FROM users WHERE login = '". trim(strip_tags($login)) ."'");

    if ($user AND password_verify($password, $user['password_hash'])) {
        userAuth($user['id']);
        return true;
    }

    return false;
}

function userAuth($userId)
{
    session_start();
    session_regenerate_id();
    $_SESSION['user_id'] = $userId;
}

function isGuest()
{
    if (!isset($_SESSION['user_id']) and isset($_COOKIE['auth'])) {
        $user = getOneByQuery("SELECT * FROM users WHERE verify_key = '". $_COOKIE['auth'] ."'");
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
        }
    }

    return !isset($_SESSION['user_id']);
}

function secretKeyForUser()
{
    if (isset($_SESSION['user_id'])) {
        $secretKey = generateSecretKey();
        executeSqlQuery("UPDATE users SET verify_key = :verify_key WHERE id = :id", [
            'id' => $_SESSION['user_id'],
            'verify_key' => $secretKey
        ]);
        return $secretKey;
    }
    return '';
}