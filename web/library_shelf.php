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
            .col-4 {width: 33.33%;}
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
            <a href="library_search.php">Search</a><br/><br/>
        </header>
        <main>
            <?php
            foreach ($db->query("SELECT shelf.book_id, shelf.author_id, books.cover, books.title, authorsinfo.name 
                                FROM shelf
                                INNER JOIN books ON shelf.book_id=books.id
                                INNER JOIN authorsinfo ON shelf.author_id=authorsinfo.id") as $row)
            {
                $bookid = $row['book_id'];
                $authorid = $row['author_id'];
                $title = $row['title'];
                $name = $row['name'];
                $cover = $row['cover'];
                echo "<img src=\"$cover\" alt=$cover><br/>" . 
                    "<a href='library_book.php?book_id=$bookid'>$title</a>" . 
                    "<br/>by " . "<a href='library_author.php?author_id=$authorid'>$name</a>" . "<br/><br/>";
            }
            ?>
            <div class="col-4">One</div>
            <div class="col-4">Two</div>
            <div class="col-4">Three</div>
        </main>
    </body>
</html>