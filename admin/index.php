<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();


?>
<html>
<head>
    <title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<div class="tables" >
    <span><a href="Authors/index.php">Authors</a></span>
    <span ><a href="Books/index.php">Books</a></span>
    <span ><a href="geners/index.php">Geners</a></span>
    <span ><a href="queries/formQueries.php">Query</a></span>
    <span><a href="index.php">reg</a></span>
</div>
<style>
    span{
        font-size: 20px;
        padding: 10px;
    }
    a{
        color: black;
    }
</style>

<form action="testreg.php" method="post">
    <p>
        <label>Ваш логин:<br></label>
        <input name="login" type="text" size="15" maxlength="15">
    </p>
    <p>
        <label>Ваш пароль:<br></label>
        <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
        <input type="submit" name="submit" value="Войти">
        <br>
        <a href="reg.php">Зарегистрироваться</a>

    </p></form>
<a class="nav-link text-uppercase"    href='logout.php'>Выйти</a>
<br>
<?php
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость<br>";
}
else
{

    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['login'];
}

?>

</body>
</html>
