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
        if (isset($_POST['searchbar']))
        {
            $searchstring = $_POST['searchbar'];
            echo $searchstring;
            
            foreach ($db->query("SELECT shelf.book_id, shelf.author_id, books.cover, books.title, authorsinfo.name 
                            FROM shelf
                            INNER JOIN books ON shelf.book_id=books.id
                            INNER JOIN authorsinfo ON shelf.author_id=authorsinfo.id
                            WHERE books.title LIKE \"%$searchstring%\"") as $row)
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
        }
        ?>
    </body>
</html>