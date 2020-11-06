<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<h2>Регистрация</h2>
<form action="save_user.php" method="post">
    <p>
        <label>Ваш логин:<br></label>
        <input name="login" type="text">
    </p>
    <p>
        <label>Ваш пароль:<br></label>
        <input name="password" type="password">
    </p>
    <p>
        <label>Ваш email:<br></label>
        <input name="email" type="email" >
    </p>
    <p>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </p></form>

</body>
</html>
