<?php

$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'библиотека'; // Имя БД

$connect = new mysqli($db_host,$db_user,$db_password,$db_base);
mysqli_set_charset($connect,'utf8');

session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
// подключаемся к базе
//include ("Authors/config/connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь

$result = mysqli_query($connect,"SELECT * FROM users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);
if (empty($myrow['password']))
{
    //если пользователя с введенным логином не существует
    exit ("Извините, введённый вами login или пароль неверный.");
}
else {
    //если существует, то сверяем пароли
    if ($myrow['password']==$password) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['login']=$myrow['login'];
        $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        $_SESSION['access'] = $myrow['access'];
        if ($myrow['access'] == 0)
            header("Location: ../user/Authors/index.php");
        else
            header("Location: ../admin/Authors/index.php");
    }
    echo "<p> Неправильный логин или пароль!</p>";
}
?>