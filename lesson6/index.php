<?php
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
</head>
<body>
    <div id="main">
        <form method="post" action="form.php">
            <input type="text" name="value1" />
            +
            <input type="text" name="value2" />
            <button type="button" class="btn-form">=</button>
            <input type="text" disabled value="0" class="total_count" />
            <div id="loading" class="d-none">
                <img src="assets/img/download.gif" alt="loading" />
            </div>
        </form>
    </div>

    <style>
        .d-none {
            display: none;
        }
    </style>

    <script>
        window.onload = function () {
            document.querySelector('.btn-form').onclick = function () {

                let value1 = document.querySelector('input[name="value1"]').value,
                    value2 = document.querySelector('input[name="value2"]').value;

                if (value1 === "" || value2 === "") {
                    confirm("Заполните все значения!!!");
                    return;
                }

                var loading = document.getElementById('loading');
                loading.classList.remove('d-none');

                (async () => {

                    const response = await fetch('form.php', {
                        method: 'POST',
                        body: "value1=" + value1 + "&value2="+ value2,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    });
                    const answer = await response.json();

                    console.log(answer)

                    // $("#dogImage").attr('src', answer.message);
                    document.querySelector('.total_count').setAttribute('value', 123);
                    loading.classList.add('d-none');
                })();
            }
        }
    </script>
</body>
</html>
