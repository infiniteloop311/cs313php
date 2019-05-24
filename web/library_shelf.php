<?php
require "dbConnect.php";
$db = getDB();

foreach ($db->query('SELECT * FROM shelf') as $row)
{
    echo $row['user_id'] . " " . $row['book_id'] . " " . $row['author_id'] . "<br>";
}

foreach ($db->query('SELECT books.title, authorsinfo.name FROM shelf
                     INNER JOIN books ON shelf.book_id=books.id
                     INNER JOIN authorsinfo ON shelf.author_id=authorsinfo.id') as $row)
{
    echo $row['title'] . " by " . $row['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Testing</title>
    </head>
    <body>
        <h1>TESTING</h1>
    </body>
</html>