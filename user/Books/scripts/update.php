<?php
require_once '../config/connect.php';

// $idBooks = $_POST['idBooks'];
// $Books_name = $_POST['Books_name'];
// $Books_descr = $_POST['Books_descr'];
// $Book_year = $_POST['Book_year'];
// $geners = $_POST['genre'];
// $authors = $_POST['author'];



//  print_r($Books_name,$Books_descr);




mysqli_query($connect,'UPDATE `книги` SET `название`="'.$_POST["название"].'"
,`описание`="'.$_POST["описание"].'",`год_написания`="'.$_POST["год_написания"].'"
,`автор`="'.$_POST["author"].'",`жанр`="'.$_POST["genre"].'" WHERE  id_book="'.$_POST["id"].'"');


header('Location: ../index.php');
exit();


?>  