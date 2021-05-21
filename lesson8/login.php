<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница авторизации пользователя</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <div id="auth_login">
        <form>
            <label for="login">Введите логин</label>
            <div>
                <input id="login" type="text" name="login" required/>
            </div>
            <br>
            <label for="password">Введите пароль</label>
            <div>
                <input id="password" type="password" name="password" required/>
            </div>
            <br>
            <button class="login-btn" type="button">Войти</button>
        </form>
    </div>

    <script src="/assets/scripts/login.js"></script>
</body>
</html>
