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
        <div class="form-group">
            <label for="login">Введите логин</label><br>
            <input id="login" type="text" name="login" required/>
        </div>
        <div class="form-group">
            <label for="password">Введите пароль</label><br>
            <input id="password" type="password" name="password" required/>
        </div>
        <div class="form-group">
            <label for="remember_me">Запомнить меня</label>
            <input type="checkbox" name="remember_me" id="remember_me"/>
        </div>
        <button class="login-btn" type="button">Войти</button>
    </form>
</div>

<script src="/assets/scripts/login.js"></script>
</body>
</html>