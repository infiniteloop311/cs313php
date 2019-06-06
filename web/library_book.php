<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Book Description</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="library_styles.css">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    </head>
    <body>
        <header>
            <div class="col-6">
                <h1>Book Info</h1>
            </div>
            <div class="col-6">
                <h4>
                    <?php
                    echo "Welcome, " . $_SESSION["first"] . " " . $_SESSION["last"] . " " . 
                        "<a href='library_logout.php'>Logout</a>";
                    ?>
                </h4>
                <a href="library_add.php">Add Book to Shelf</a>
            </div>
            <div class="col-12">
                <a href="library_shelf.php">Home</a>
                <a href="library_search.php">Search</a><br/><br/>
            </div>
        </header>
        <main>
            <?php
            if (isset($_SESSION['user'])) {
                $id = $_SESSION["userid"];
                $username = $_SESSION['user'];
            } else {
                header("Location: library_login.php");
                die();
            }
            
            if (isset($_GET['book_id']))
            {
                $id = $_GET['book_id'];

                foreach ($db->query("SELECT * FROM books WHERE id='$id'") as $row)
                {
                    $cover = $row['cover'];
                    echo "<div><img src=\"$cover\" alt=$cover><br/>" . $row['title'] . 
                        "<br/><br/>" . $row['description'] . "<br/><br/>" . $row['isbn'] . "</div>";
                }
                echo "<a href=\"library_update.php?updatebook=$id\">Update Book Info</a>";
            }
            ?>
        </main>
    </body>
</html>