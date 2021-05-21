<?php

function generatePasswordHash($password)
{
    return password_hash($password, PASSWORD_DEFAULT, [ 'tasks' => 8 ]);
}

function generateSecretKey()
{
    return crypt(generate_string("beautiful_site123456", 24), generateSalt());
}

function generateSalt()
{
    return uniqid(rand(), true);
}

function generate_string($input, $strength = 16) {
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, strlen($input) - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}
