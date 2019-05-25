<?php
require "dbConnect.php";
$db = getDB();

if (isset($_GET['book_id']))
{
    $id = $_GET['book_id'];

    foreach ($db->query("SELECT * FROM books WHERE id='$id'") as $row)
    {
        $cover = $row['cover'];
        echo "<img src=\"$cover\" alt=$cover><br/>" . $row['title'] . 
            "<br/><br/>" . $row['description'] . "<br/><br/>" . $row['isbn'];
    }
}
?>