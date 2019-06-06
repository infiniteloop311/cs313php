<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Info</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="library_styles.css">
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
        <script>
            function bookFormReveal() {
                document.forms["book"].style.display = "block";
            }
            function authorFormReveal() {
                document.getElementById('author').style.display = "block";
            }
        </script>
    </head>
    <body>
        <header>
            <div class="col-6">
                <h1>Update Info</h1>
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

            if (isset($_GET['updatebook'])) {
                echo "You're updating a book!";
                echo "<script> bookFormReveal(); </script>";
            } else if (isset($_GET['updateauthor'])) {
                echo "You're updating an author!";
                echo "<script> authorFormReveal(); </script>";
            } else {
                header("Location: library_shelf.php");
                die();
            }
            ?>
            <form id="book" name="book_update" method="post" action="library_update.php" style="display: none">
                <input type="text" name="title" placeholder="Enter Title"><br/><br/>
                <textarea rows="5" cols="50" name="description" placeholder="Enter Description"></textarea><br/><br/>
                <input type="text" name="cover" placeholder="Enter Cover Filename"><br/><br/>
                <input type="text" name="isbn" placeholder="Enter ISBN"><br/><br/>
            </form>
            
            <form id="author" name="author_update" method="post" action="library_update.php" style="display: none">
                <input type="text" name="name" placeholder="Enter Author's Name"><br/><br/>
                <textarea rows="5" cols="50" name="bio" placeholder="Enter Author Bio"></textarea><br/><br/>
                <input type="text" name="portrait" placeholder="Enter Portrait Filename"><br/><br/>
            </form>
        </main>
    </body>
</html>