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
        <form method="post" action="library_search.php">
            <input type="text" name="searchbar" placeholder="Search by Title or Author">
            <button>Search</button>
        </form>
        <?php	
        if (isset($_POST['searchbar'])) {
            $searchstring = $_POST['searchbar'];
            echo "<br/><br/>";
            
            $stmt = $db->prepare('SELECT s.book_id, s.author_id, books.cover, books.title as title, authorsinfo.name as name
                                  FROM shelf as s
                                  INNER JOIN books ON s.book_id=books.id
                                  INNER JOIN authorsinfo ON s.author_id=authorsinfo.id
                                  WHERE title ILIKE :search OR name ILIKE :search');
            $stmt->execute(array(':search' => "%$searchstring%"));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($rows)) { 
                echo "<br/>No Results Found<br/>";
            } else if (!empty($rows)) {
                echo "<br/>Rows Found<br/>";
            }
            
            foreach ($rows as $row) {
                $bookid = $row['book_id'];
                $authorid = $row['author_id'];
                $cover = $row['cover'];
                $title = $row['title'];
                $name = $row['name'];
                echo "<img src=\"$cover\" alt=$cover><br/>" . 
                    "<a href='library_book.php?book_id=$bookid'>$title</a>" . 
                    "<br/>by " . "<a href='library_author.php?author_id=$authorid'>$name</a>" . "<br/><br/>";
            }
        }
        ?>
    </body>
</html>