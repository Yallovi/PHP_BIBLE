<?php

require_once 'config/connect.php';
$idbooks= $_GET['id'];
$book=mysqli_query($connect,"SELECT * FROM `книги` WHERE `id_book` = '$idbooks' ");
$book = mysqli_fetch_array($book);
    


echo '<form method="post" action="scripts/update.php">
<input type="hidden" name="id" value="'.$book['id_book'].'">
<p>Название:<input name="название" type="text" value="'.$book['название'].'"></p>
<p>Описание:<input name="описание" type="text" value="'.$book['описание'].'">
<p>год_написания:<input name="год_написания" type="number" value="'.$book['год_написания'].'"></p>




<p>жанр:<select name="genre"> <option disabled>Выберите жанр</option></p>';

echo $_GET['id'];
$genre=mysqli_query($connect,'SELECT `id_genre`,`название_жанра` from `жанры`');
$author=mysqli_query($connect,'SELECT `id_author`,`ФИО` from `автор`');

while ($rowG=mysqli_fetch_array($genre)){
  if ($_GET['id']<>$rowG['id_genre'])
  echo ' <option value='.$rowG['id_genre'].'>'.$rowG['название_жанра'].'</option>';
  else 
  echo ' <option selected value='.$rowG['id_genre'].'>'.$rowG['название_жанра'].'</option>';
}
echo '</select>


<p>автор:<select name="author"> <option disabled>Выберите автора</option></p>';
while ($rowA=mysqli_fetch_array($author)){
  if ($_GET['id']<>$rowA['id_author'])
  echo ' <option value='.$rowA['id_author'].'>'.$rowA['ФИО'].'</option>';
  else 
  echo ' <option selected value='.$rowA['id_author'].'>'.$rowA['ФИО'].'</option>';
}
echo '</select>

<p><input type=submit value="обновить"/></p></form>';




'<p>жанр:<select  name="genre"> <option disabled>Выберите жанр</option></p>';
// echo $_GET['id'];
// $genre=mysqli_query($connect,'SELECT `id_genre`,`название_жанра` from `жанры`');
// $author=mysqli_query($connect,'SELECT `id_author`,`ФИО` from `автор`');


// while ($rowG=mysqli_fetch_array($genre)){
//   if ($_GET['id']<>$rowG['id_genre'])
//   echo ' <option value='.$rowG['id'].'>'.$rowG['название_жанра'].'</option>';
//   else 
//   echo ' <option selected value='.$rowG['id'].'>'.$rowG['название_жанра'].'</option>';
// }
// echo '</select>


// <p>автор:<select name="author"> <option disabled>Выберите автора</option></p>';
// while ($rowA=mysqli_fetch_array($author)){
//   if ($_GET['id']<>$rowA['id_author'])
//   echo ' <option value='.$rowA['id'].'>'.$rowA['ФИО'].'</option>';
//   else 
//   echo ' <option selected value='.$rowA['id'].'>'.$rowA['ФИО'].'</option>';
// }
// echo '</select>

// <p><input type=submit value="обновить"/></p></form>';










  ?>
  

   
</form>
</body>
</html>