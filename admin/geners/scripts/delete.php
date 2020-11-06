<?php

require_once '../config/connect.php';

$idgeners = $_GET['id'];
mysqli_query($connect, "DELETE FROM `жанры` WHERE `жанры`.`id_genre` = '$idgeners'" );
header('Location: ../index.php');
exit();