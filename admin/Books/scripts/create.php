<?php
require_once '../config/connect.php';

// if (!empty($_POST['name']|| $_POST['name']=''|| $_POST['date1']=''|| $_POST['date1']=''))
//  {
$Books_name = $_POST['Books_name'];
$Books_descr = $_POST['Books_descr'];
$Book_year = $_POST['Book_year'];
$geners = $_POST['geners'];
$authors = $_POST['authors'];
 
$result=mysqli_query($connect,'INSERT INTO `книги`( `название`, `описание`, `год_написания`, `автор`, `жанр`) VALUES
 ("'.$_POST["name"].'","'.$_POST["comment"].'","'.$_POST["date"].'","'.$_POST["author"].'","'.$_POST["genre"].'")');
header('Location: ../index.php');
exit();
//  }
//  else
//  {
//  echo "Переменные не дошли или вы вели пустую строку. Проверьте все еще раз.";
//  }

?>