<?php

require_once 'config/connect.php';

$idBooks= $_GET['id']; 
$Books= mysqli_query($connect, "SELECT * FROM `автор` WHERE `id_author` = '$idBooks'");
$Books = mysqli_fetch_assoc($Books);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
<h3>Add new authors</h3>
<form method="post" action="scripts/update.php">
<input  type="" name="id" value="<?= $Books['id_author']?>">
    <p>FIO</p>
    <input type="text" name="ФИО" value="<?= $Books['ФИО']?>">
    <p>DATE_born</p>
    <input type="date" name="дата_рождения" value="<?= $Books['дата_рождения']?>">
    <p>date_die</p>
    <input type="date" name="дата_смерти" value="<?= $Books['дата_смерти']?>"> <br> <br>
    <button type="submit">UPDATE</button>

   
</form>
</body>
</html>