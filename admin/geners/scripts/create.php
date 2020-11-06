<?php
require_once '../config/connect.php';



$genersName = $_POST['geners_name'];

mysqli_query($connect,  "INSERT INTO `жанры` (`id_genre`, `название_жанра`) VALUES (NULL, '
$genersName')");

header('Location: ../index.php');
exit();

?>