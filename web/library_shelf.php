<?php
require "dbConnect.php";
$db = get_db();

foreach ($db->query('SELECT * FROM shelf') as $row)
{
    echo $row['user_id'] . " " . $row['book_id'] . ":" . $row['author_id'] . "<br>";
}

/*
foreach ($db->query('SELECT books.title, authorsinfo.name FROM library
                     INNER JOIN books ON library.book_id=books.id
                     INNER JOIN authorsinfo ON library.author_id=authorsinfo.id') as $row)
{
    echo $row['title'] . " by " . $row['name'];
}
*/
?>