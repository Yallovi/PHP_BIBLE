
<?
require_once 'config/connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geners</title>
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
<h1 style="text-align:center; margin-bottom: 30px;">Tables "Geners"</h1>
<h2>Select table</h2>
    <div class="tables">
        <span><a href="../Authors/index.php">Authors</a></span>
        <span ><a href="../Books/index.php">Books</a></span>
        <span ><a href="index.php">Geners</a></span>
        <span ><a href="../queries/formQueries.php">Query</a></span>
        <span><a href="../index.php">reg</a></span>
    </div>
    <table>
        <tr>
            <th>idgeners</th>
            <th>geners_name</th>
            
        </tr>
        <?php 
            $Books = mysqli_query($connect, "SELECT * FROM `жанры`");
            $Books =mysqli_fetch_all($Books);
            foreach ($Books as $Book) {
                ?>
                    <tr>
                        <td><?= $Book[0]?></td>
                        <td><?= $Book[1]?></td>
                        <!-- <td><a href="update.php?id=<?= $Book[0]?>">Update</a></td>
                        <td><a style="color:red" href="scripts/delete.php?id=<?= $Book[0]?>">delete</a></td> -->
                    </tr>
                    
                <?
            }
        ?>
    </table>
    <!-- <h3>Add new geners</h3>
    <form method="post" action="scripts/create.php">
        <p>geners_name</p>
        <input type="text" name="geners_name"> <br> <br>
        <button type="submit">add new Geners</button>
        
    </form> -->

</body>
</html>