<?php

require_once '../config/connect.php';

$idAuthors = $_GET['id'];
mysqli_query($connect, "DELETE FROM `автор` WHERE `автор`.`id_author` = '$idAuthors'" );
header('Location: ../index.php');
exit();    