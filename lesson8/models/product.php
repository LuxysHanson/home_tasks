<?php

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