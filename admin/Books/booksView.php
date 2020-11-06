<?php
require_once 'config/connect.php';
$idbooks= $_GET['id'];
$book=mysqli_query($connect,"SELECT * FROM `книги` WHERE `id_book` = '$idbooks' ");
$book = mysqli_fetch_array($book);

$comments = mysqli_query($connect, "SELECT * FROM `commen` WHERE `books_id` = '$idbooks'");
$comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html lang="en">
<head>

    <title>BooksView</title>
</head>
<body>

<h2>Название книги:<br></h2>
    <p><?= $book['название'] ?></p>
<h4>Название книги:<br></h4>
    <p><?= $book['описание'] ?></p>
<h4>Название книги:<br>  </h4>
    <p><?= $book['год_написания'] ?></p>

<form action="createComments.php" method="POST">
    <input type="hidden" name="id" value="<?= $book['id_book']?>"> <br>
    <textarea name="body" ></textarea> <br><br>
    <button type="submit">Добавить комментарий</button>
</form>

<h2>Comments</h2>


<ul>

    <?php
        foreach ($comments as $comment)
        {
            ?>

            <li><?= $comment[2] ?></li>

        <?php
        }
    ?>
</ul>
</body>
</html>
