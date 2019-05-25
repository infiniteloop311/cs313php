<?php
require "dbConnect.php";
$db = getDB();

echo 'Author Page';

if (isset($_GET['author_id']))
{
    $id = $_GET['author_id'];

    foreach ($db->query("SELECT * FROM authorsinfo WHERE id='$id'") as $row)
    {
        echo $row['name'];
    }
}
?>