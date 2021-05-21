<?php

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
