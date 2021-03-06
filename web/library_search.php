<?php
session_start();

require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search My Shelf</title>
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
                <h1>Search by Book or by Author</h1>
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
        <form method="post" action="library_search.php">
            <input type="text" name="searchbar" placeholder="Search by Title or Author"><br/><br/>
            <button>Search</button>
        </form>
        <?php
        if (isset($_SESSION['user'])) {
            $userid = $_SESSION["userid"];
            $username = $_SESSION['user'];
        } else {
            header("Location: library_login.php");
            die();
        }
        
        if (isset($_POST['searchbar'])) {
            $searchstring = htmlspecialchars($_POST['searchbar']);
            echo "<br/><br/>";
            
            $stmt = $db->prepare('SELECT s.book_id, s.author_id, books.cover, books.title as title, authorsinfo.name as name
                                  FROM shelf as s
                                  INNER JOIN books ON s.book_id=books.id
                                  INNER JOIN authorsinfo ON s.author_id=authorsinfo.id
                                  WHERE title ILIKE :search OR name ILIKE :search');
            $stmt->execute(array(':search' => "%$searchstring%"));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($rows)) { 
                echo "No Results Found<br/>";
            } else if (!empty($rows)) {
                foreach ($rows as $row) {
                    $bookid = $row['book_id'];
                    $authorid = $row['author_id'];
                    $cover = $row['cover'];
                    $title = $row['title'];
                    $name = $row['name'];
                    echo "<div class=\"col-4\"><img src=\"$cover\" alt=$cover><br/>" . 
                        "<a href='library_book.php?book_id=$bookid'>$title</a>" . 
                        "<br/>by " . "<a href='library_author.php?author_id=$authorid'>$name</a></div>";
                }
            }            
        }
        ?>
    </body>
</html>