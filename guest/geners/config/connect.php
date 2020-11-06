<?
$server = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'библиотека';
$connect= mysqli_connect($server,$username,$password,$dbname);
mysqli_select_db($connect,$dbname);
?>