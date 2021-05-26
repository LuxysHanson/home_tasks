<?php
/** @var $orders array */

require __DIR__ . "/../../enums/order_enum.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ панель</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<?php include "views/layouts/blocks/header.php" ?>

<div id="admin_panel">

    <?php include "views/layouts/blocks/menu.php" ?>

    <? if ($orders) : ?>
        <table>
            <tr>
                <td>Номер заказа</td>
                <td>Дата заказа</td>
                <td>Статус заказа</td>
                <td>Действия</td>
            </tr>

            <? foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $order['order_id'] ?></td>
                    <td><?= date('d-m-Y H:i', $order['date']) ?></td>
                    <td><?= labels()[$order['status']] ?></td>
                    <td>
                        <a title="Подтвердить заказ" href="<?= "state.php?id=" . $order['order_id'] . "&status=" . STATUS_APPROVE ?>">[+]</a>
                        <a title="Отклонить заказ" href="<?= "state.php?id=" . $order['order_id'] . "&status=" . STATUS_REJECT ?>">[-]</a>
                    </td>
                </tr>
            <? endforeach; ?>

        </table>
    <? else: ?>
        <div class="text-danger">
            Нет заказов
        </div>
    <? endif; ?>

</div>
</body>
</html>
