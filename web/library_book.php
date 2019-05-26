<?php
require "dbConnect.php";
$db = getDB();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Shelf</title>
        <style>
            img {
                width: 15%;
            }
        </style>
    </head>
    <body>
        <?php
        if (isset($_GET['book_id']))
        {
            $id = $_GET['book_id'];

            foreach ($db->query("SELECT * FROM books WHERE id='$id'") as $row)
            {
                $cover = $row['cover'];
                echo "<img src=\"$cover\" alt=$cover><br/>" . $row['title'] . 
                    "<br/><br/>" . $row['description'] . "<br/><br/>" . $row['isbn'];
            }
        }
        ?>
    </body>
</html>