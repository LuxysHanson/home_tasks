<?php

function getSessionId()
{
    session_start();
    return session_id();
}

function sendReply(array $send)
{
    echo json_encode($send);
    die();
}

function login()
{

}

function getTotalCountProducts($total)
{
    $count = 0;
    if (!empty($total)) {
        foreach ($total as $item) {
            $count += $item['count'];
        }
    }
    return $count;
}

function getTotalAmountOrder($total)
{
    $count = 0;
    if (!empty($total)) {
        foreach ($total as $item) {
            $count += $item['price'] * $item['total_count'];
        }
    }
    return $count;
}