<?php
require_once 'config/connect.php';
$id = $_POST['id'];
$body = $_POST['body'];

mysqli_query($connect, "INSERT INTO `commen` (`id`, `books_id`, `body`) VALUES (NULL, '$id', '$body')");

header("location: booksView.php?id=" . $id);