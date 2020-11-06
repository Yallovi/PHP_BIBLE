<?php
require_once '../config/connect.php';

$idgeners = $_POST['idgeners'];
$Books_name = $_POST['geners_name'];

 
mysqli_query($connect, "UPDATE `жанры` SET `название_жанра` = '$Books_name' WHERE `жанры`.`id_genre` = '$idgeners'");
header('Location: ../index.php');
exit();


?>  