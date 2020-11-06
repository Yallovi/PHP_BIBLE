<?php
require_once '../config/connect.php';


$FIO = $_POST['FIO'];
$Date_born = $_POST['Date_born'];
$Date_die = $_POST['Date_die'];
 
mysqli_query($connect,  "INSERT INTO `автор` (`id_author`, `ФИО`, `дата_рождения`, `дата_смерти`) VALUES (NULL, '$FIO', '$Date_born', '$Date_die')");

header('Location: ../index.php');
exit();