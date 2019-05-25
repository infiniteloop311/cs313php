<?php
require "dbConnect.php";
$db = getDB();

foreach ($db->query('SELECT books.cover, books.title, authorsinfo.name FROM shelf
                     INNER JOIN books ON shelf.book_id=books.id
                     INNER JOIN authorsinfo ON shelf.author_id=authorsinfo.id') as $row)
{
    $cover = $row['cover'];
    echo "<img src=\"$cover\" alt=book_cover>";
    echo $row['cover'] . "<br/>" . $row['title'] . " by " . $row['name'] . "<br/><br/>";
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