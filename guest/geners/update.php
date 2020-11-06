    <?php

    require_once 'config/connect.php';

    $idgeners= $_GET['id']; 
    $geners= mysqli_query($connect, "SELECT * FROM `жанры` WHERE `id_genre` = '$idgeners'");
    $geners = mysqli_fetch_assoc($geners);
    //print_r($geners);




    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>update</title>
    </head>
    <body>
    <h3>Add new geners</h3>
    <form method="post" action="scripts/update.php">
    <input  type="hidden" name="idgeners" value="<?= $geners['id_genre']?>">
        <p>geners_name</p>
        <input type="text" name="geners_name" value="<?= $geners['название_жанра']?>"> <br> <br>
        <button type="submit">Update</button>

    
    </form>
    </body>
    </html>