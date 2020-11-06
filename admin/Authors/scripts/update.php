<?php
require_once '../config/connect.php';

$idBooks = $_POST['id'];
$FIO = $_POST['ФИО'];
$Date_born = $_POST['дата_рождения'];
$Date_die = $_POST['дата_смерти'];
 
mysqli_query($connect,"UPDATE `автор` SET `ФИО` = '$FIO', `дата_рождения` = '$Date_born', `дата_смерти` = '$Date_die' WHERE `автор`.`id_author` = '$idBooks'");

header('Location: ../index.php');
exit();


?>  