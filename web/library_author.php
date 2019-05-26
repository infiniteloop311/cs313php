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
        <header>
            <a href="library_shelf.php">Home</a><br/><br/>
        </header>
        <?php
        if (isset($_GET['author_id']))
        {
            $id = $_GET['author_id'];

            foreach ($db->query("SELECT * FROM authorsinfo WHERE id='$id'") as $row)
            {
                $portrait = $row['portrait'];
                echo "<img src=\"$portrait\" alt=$portrait><br/>" . $row['name'] . 
                    "<br/><br/>" . $row['bio'];
            }
        }
        ?>
    </body>
</html>