<?php

const STATUS_NEW = 0;
const STATUS_APPROVE = 1;
const STATUS_REJECT = 2;
const STATUS_SEND = 3;


function labels()
{
    return [
        STATUS_NEW => 'Новый',
        STATUS_APPROVE => 'Подтвержден',
        STATUS_REJECT => 'Отклонен',
        STATUS_SEND => 'Отправлен'
    ];
}