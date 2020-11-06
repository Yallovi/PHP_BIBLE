

<html>
 <head>
  <title>Querys</title>
 </head>
 <body>
 <h1 style="text-align:center;">Querys</h1>
    <h2 >Select table</h2>
    <div class="tables">
        <span><a href="../Authors/index.php">Authors</a></span>
        <span ><a href="../Books/index.php">Books</a></span>
        <span ><a href="../geners/index.php">Geners</a></span>
        <span><a href="../index.php">reg</a></span>
    </div>
<style>
    span{
        font-size: 20px;
        padding: 10px;
    }
    a{
        color: black;
    }
    .tables{
        margin-bottom: 30px;
    }
</style>

 <?


echo '<form method="post" action="formQueries.php">
<select style="height:140px" name="info[]" multiple>
 <option disabled>Выберите поле для запроса</option>
  <option value=",название">название</option>
  <option value=",описание">описание</option>
  <option value=",год_написания">год_написания</option>
  <option value=",название_жанра">название_жанра</option>
  <option value=",ФИО">ФИО</option>
  <option value=",дата_рождения">дата_рождения</option>
  <option value=",дата_смерти">дата_смерти</option>
</select>

<select required name="filtr">
<option></option>
 <option disabled>Выберите поля для фильтрацииы</option>
  <option value="название">название</option>
  <option value="описание">описание</option>
  <option value="год_написания">год_написания</option>
  <option value="название_жанра">название_жанра</option>
  <option value="ФИО">ФИО</option>
  <option value="дата_рождения">дата_рождения</option>
  <option value="дата_смерти">дата_смерти</option>
</select>

<select  name="type">
 <option disabled>тип фильтрации</option>
  <option value="ASC">по возрастанию</option>
  <option value="DESC" selected>по убыванию</option>
</select>

<input name="button" type=submit value=" submit"/></form>';

$server = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'библиотека';
$connect=mysqli_connect($server, $username, $password, $dbname);
mysqli_select_db($connect,$dbname);

if ($_POST["info"]){
  foreach ($_POST["info"] as $selectedOption)
  {    
      $array[]=$selectedOption;
  }
  
  $array[0]=substr($array[0], 1);
  
  
  if ($array[0]=="название_жанра"&&count($array)==1){
    $result=mysqli_query($connect,'SELECT '.$array[0].'
        from `жанры`
        ORDER BY название_жанра '.$_POST["type"].'
    ');
  }else
  
      if((($array[0]=="ФИО"||$array[0]=="дата_рождения"||$array[0]=="дата_смерти")&&count($array)==1)||
    
  
    ((($array[0]=="ФИО"||$array[0]=="дата_рождения"||$array[0]=="дата_смерти")||
    ($array[1]=="ФИО"||$array[1]=="дата_рождения"||$array[1]=="дата_смерти"))&&count($array)==2)||
  
  
    ((($array[0]=="ФИО"||$array[0]=="дата_рождения"||$array[0]=="дата_смерти")||
    ($array[1]=="ФИО"||$array[1]=="дата_рождения"||$array[1]=="дата_смерти")||
    ($array[3]=="ФИО"||$array[3]=="дата_рождения"||$array[3]=="дата_смерти"))&&count($array)==3)
    ){
      if ($_POST["filtr"]!="ФИО"&&$_POST["filtr"]!="дата_рождения"&&$_POST["filtr"]!="дата_смерти"){
        echo "выбран не правельный фильтр";
        exit();
      }
      $result=mysqli_query($connect,'SELECT '.$array[0].''.$array[1].''.$array[2].'
          from `автор`
          ORDER BY '.$_POST["filtr"].' '.$_POST["type"].'
      ');
    }else{
  
      if ($_POST["filtr"]){
      
      }
  $result=mysqli_query($connect,'SELECT '.$array[0].''.$array[1].''.$array[2].''.$array[3].''.$array[4].'
  '.$array[5].''.$array[6].'
      from `книги`
      JOIN `жанры`
      ON `книги`.`жанр`=`жанры`.`id_genre`
      JOIN `автор`
      ON `книги`.`автор`=`автор`.`id_author`
      ORDER BY '.$_POST["filtr"].' '.$_POST["type"].'
  '); }
  
  echo '<table bgcolor="#FFFAFA" border="5">
  <tr>';
  foreach($array as $name){
    if ($name!=$array[0]){
    $name=substr($name, 1);}
    echo '<td>'.$name.'</td>';
  }
  echo '<tr>';
  while ($row=mysqli_fetch_row($result)) {
    echo '<tr>';
    
        foreach($row as $mass){
          echo '<td>'.$mass.'</td>';
      }
      echo '</tr>';
  }
  echo '</table>';
  }




  ?>
 </body>
</html>