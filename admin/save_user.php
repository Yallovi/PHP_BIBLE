<?php

$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'библиотека'; // Имя БД

$connect = new mysqli($db_host,$db_user,$db_password,$db_base);
mysqli_set_charset($connect,'utf8');

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
//заносим введенный пользователем email в переменную $email, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password) or empty($email)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$email = stripslashes($email);
$email = htmlspecialchars($email);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$email = trim($email);
if (!(preg_match("/@/", $email)))
    echo "Неверно введен e-mail<br/>";
//Минимум восемь символов, как минимум одна заглавная буква, одна строчная буква и одна цифра:
elseif (!(preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,20}/",$password)))
    echo "Пароль должен быть не менее 5 символов, содержать буквы разного регистра и минимум 1 цифру<br/>";
else {

// подключаемся к базе
    //include("Authors/config/connect.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
    $result = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `login`='$login'");
    $myrow = mysqli_fetch_array ($result);
    if (!empty($myrow['id'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    $result1 = mysqli_query($connect, "SELECT id FROM users WHERE email='$email'");
    $row = mysqli_fetch_array($result1);
    if (!empty($row['id'])) {
        exit ("Извините, введённый вами email уже зарегистрирован. Введите другой email.");
    }
// если такого нет, то сохраняем данные
    //$result2 = mysqli_query($connect, "INSERT INTO users (login,password,email) VALUES('$login','$password','$email')");
    $result2 = mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `password`, `email`, `access`) VALUES (NULL, '$login','$password','$email', 0)");
// Проверяем, есть ли ошибки
    if ($result2 == 'true') {
        echo "Вы успешно зарегистрированы! ";
    } else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
}
