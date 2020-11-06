<?php

require_once '../config/connect.php';

$idBooks = $_GET['id'];
mysqli_query($connect, "DELETE FROM `книги` WHERE `книги`.`id_book` = '$idBooks'" );
header('Location: ../index.php');
exit();