<?php
require "dbConnect.php";
$db = getDB();

echo 'Book Page';

if (isset($_GET['book_id']))
{
    $id = $_GET['book_id'];

    foreach ($db->query("SELECT * FROM books WHERE id='$id'") as $row)
    {
        echo $row['title'];
    }
}
?>