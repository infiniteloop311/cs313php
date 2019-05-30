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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <a href="library_shelf.php">Home</a><br/><br/>
        </header>
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