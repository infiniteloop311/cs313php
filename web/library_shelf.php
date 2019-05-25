<?php
require "dbConnect.php";
$db = getDB();

foreach ($db->query('SELECT shelf.book_id, shelf.author_id, books.cover, books.title, authorsinfo.name 
                     FROM shelf
                     INNER JOIN books ON shelf.book_id=books.id
                     INNER JOIN authorsinfo ON shelf.author_id=authorsinfo.id') as $row)
{
    $bookid = $row['book_id'];
    $authorid = $row['author_id'];
    $title = $row['title'];
    $cover = $row['cover'];
    echo "<img src=\"$cover\" alt=$cover><br/>" . 
        "<a href='library_book.php?book_id=$bookid'>$title</a>" . $row['title'] . 
        "<br/>by " . $row['name'] . "<br/><br/>";
    
    //"<a href='scripture.php?row_id=$id'>Visit Scripture</a>"
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Testing</title>
        <style>
            img {
                width: 15%;
            }
        </style>
    </head>
    <body>
        <h1>TESTING</h1>
    </body>
</html>