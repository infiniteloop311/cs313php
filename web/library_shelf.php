<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Shelf</title>
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
            <div class="col-6" style="text-align: left">
                <h1>BookShelf</h1>
            </div>
            <div class="col-6" style="text-align: right">
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
                <span>      </span>
                <a href="library_search.php">Search</a><br/><br/>
            </div>
        </header>
        <main style="margin: 0px; border: 0px">
            <?php
            if (isset($_SESSION['user'])) {
                $id = $_SESSION["userid"];
                $username = $_SESSION['user'];
            } else {
                header("Location: library_login.php");
                die();
            }
            
            foreach ($db->query("SELECT shelf.user_id, shelf.book_id, shelf.author_id, books.cover, books.title, authorsinfo.name 
                                FROM shelf
                                INNER JOIN books ON shelf.book_id=books.id
                                INNER JOIN authorsinfo ON shelf.author_id=authorsinfo.id
                                WHERE user_id=$id") as $row)
            {
                $bookid = $row['book_id'];
                $authorid = $row['author_id'];
                $title = $row['title'];
                $name = $row['name'];
                $cover = $row['cover'];
                echo "<div class=\"col-4\"><img src=\"$cover\" alt=$cover><br/>" . 
                    "<a href='library_book.php?book_id=$bookid'>$title</a>" . 
                    "<br/>by " . "<a href='library_author.php?author_id=$authorid'>$name</a></div>";
            }
            ?>
        </main>
    </body>
</html>