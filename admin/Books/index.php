
<?
require_once 'config/connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db</title>
</head>
<style>
    th, td {
        padding:10px;
    }
    th {
        background: #606060;
        color: #fff
    }
    td{
        background: #b5b5b5;
    }
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
<body>
<h1 style="text-align:center; margin-bottom: 30px;">Tables "Books"</h1>
<h2>Select table</h2>
    <div class="tables">

        <span><a href="../Authors/index.php">Authors</a></span>
        <span ><a href="index.php">Books</a></span>
        <span ><a href="../geners/index.php">Geners</a></span>
        <span ><a href="../queries/formQueries.php">Query</a></span>
        <span><a href="../index.php">reg</a></span>
    </div>
    <table>
        <tr>
            <th>idBooks</th>
            <th>Books_name</th>
            <th>Books_descr</th>
            <th>Book_year</th>
            <th>geners</th>
            <th>authors</th>
        </tr>
        <?php 
            $Books = mysqli_query($connect, "SELECT * FROM `книги`");
            $Books =mysqli_fetch_all($Books);
            foreach ($Books as $Book) {
                ?>
                    <tr>
                        <td><?= $Book[0]?></td>
                        <td><?= $Book[1]?></td>
                        <td><?= $Book[2]?></td>
                        <td><?= $Book[3]?></td>
                        <td><?= $Book[4]?></td>
                        <td><?= $Book[5]?></td>
                        <td><a href="booksView.php?id=<?= $Book[0]?>">View</a></td>
                        <td><a href="update.php?id=<?= $Book[0]?>">Update</a></td>
                        <td><a style="color:red" href="scripts/delete.php?id=<?= $Book[0]?>">delete</a></td>
                    </tr>
                    
                <?
            }
        ?>
    </table>
    <!-- <h3>Add new Books</h3>
    <form method="post" action="scripts/create.php">
        <p>Books_name</p>
        <input type="text" name="Books_name">
        <p>Books_descr</p>
        <input type="text" name="Books_descr">
        <p>Book_year</p>
        <input type="number" name="Book_year">
        <p>geners</p>
        <input type="number" name="geners">
        <p>authors</p>
        <input type="number" name="authors"> <br> <br>
        <button type="submit"> add new Books</button>
        
    </form> -->

    <?
        $result=mysqli_query($connect,'SELECT `id_book`,`название`,`описание`,`год_написания`,`id_genre`,`название_жанра`,`id_author`,`ФИО` from `книги`
        JOIN `жанры`
        ON `книги`.`жанр`=`жанры`.`id_genre`
        JOIN `автор`
        ON `книги`.`автор`=`автор`.`id_author`
        ');
        $genre=mysqli_query($connect,'SELECT `id_genre`,`название_жанра` from `жанры`');
        $author=mysqli_query($connect,'SELECT `id_author`,`ФИО` from `автор`');
        
        
        
        echo '<form method="post" action="scripts/create.php"> <br/>
        <p><input name="name" type="text" placeholder="название"><br/><br/>
        <input name="comment" type="text" placeholder="описаниие"><br/><br/>
        <input name="date" type="number" placeholder="год написания"></p>
        

        <select name="genre"> <option hidden>Выберите жанр</option> ';
        while ($rowG=mysqli_fetch_array($genre)){
            echo ' <option value='.$rowG['id_genre'].'>'.$rowG['название_жанра'].'</option>';
        }
        echo '</select> <br/><br/>
        
        
        <select name="author"> 
        <option hidden>Выберите автора</option>';
        while ($rowA=mysqli_fetch_array($author)){
            echo ' <option value='.$rowA['id_author'].'>'.$rowA['ФИО'].'</option>';
        }
        echo '</select> <br/><br/>
        
        
        <input type=submit value="add new book">
        </form>';
        
       
          ?>

</body>
</html>