<?php

function getUser()
{
    return getOneByQuery("SELECT * FROM users WHERE id = " . $_SESSION['user_id']);
}