
<?
require_once 'config/connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
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
<h1 style="text-align:center; margin-bottom: 30px;">Tables "Authors"</h1>
    <h2>Select table</h2>
    <div class="tables">

        <span><a href="index.php">Authors</a></span>
        <span ><a href="../Books/index.php">Books</a></span>
        <span ><a href="../geners/index.php">Geners</a></span>
        <span ><a href="../queries/formQueries.php">Query</a></span>
        <span><a href="../index.php">reg</a></span>
    </div>

    
    
    <table>
        <tr>
            <th>idAuthors</th>
            <th>FIO</th>
            <th>date_born</th>
            <th>date_die</th>
        </tr>
        <?php 
            $Books = mysqli_query($connect, "SELECT * FROM `автор`");
            $Books =mysqli_fetch_all($Books);
            foreach ($Books as $Book) {
                ?>
                    <tr>
                        <td><?= $Book[0]?></td>
                        <td><?= $Book[1]?></td>
                        <td><?= $Book[2]?></td>
                        <td><?= $Book[3]?></td>
                        <!-- <td><a href="update.php?id=<?= $Book[0]?>">Update</a></td>
                        <td><a style="color:red" href="scripts/delete.php?id=<?= $Book[0]?>">delete</a></td> -->
                    </tr>
                    
                <?
            }
        ?>
    </table>
    <!-- <h3>Добавить нового автора</h3>
    <form method="post" action="scripts/create.php">
        <p>FIO</p>
        <input type="text" name="FIO">
        <p> date_born</p>
        <input type="date" name="Date_born">
        <p>date_die</p>
        <input type="date" name="Date_die"> <br> <br>
        <button type="submit"> add new authors  </button>
        
    </form> -->

</body>
</html>